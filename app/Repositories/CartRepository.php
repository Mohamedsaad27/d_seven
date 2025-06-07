<?php

namespace App\Repositories;

use App\Interfaces\CartRepositoryInterface;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ShippingZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreated;

class CartRepository implements CartRepositoryInterface
{
    protected $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function getCart()
    {
        if (Auth::check()) {
            $authUser = Auth::user()->id;
            $cart = Cart::with(['cartItems.product.productImages', 'cartItems.product.discounts', 'cartItems.product.brand'])
                ->where('user_id', $authUser)
                ->orderBy('created_at', 'desc')
                ->first();

            if (!$cart) {
                $cart = new Cart();
                $cart->user_id = $authUser;
                $cart->save();
            }
        } else {
            $sessionCartId = session('cart_id');

            if ($sessionCartId) {
                $cart = Cart::with(['cartItems.product.productImages', 'cartItems.product.discounts', 'cartItems.product.brand'])
                    ->where('id', $sessionCartId)
                    ->orderBy('created_at', 'desc')
                    ->first();
            }

            if (empty($cart)) {
                $cart = new Cart();
                $cart->cartItems = collect([]);
            }
        }

        $productIdsToExclude = $cart->cartItems->isNotEmpty() ? $cart->cartItems->pluck('product_id')->toArray() : [0];

        $recommendedProducts = Product::where('is_active', true)
            ->whereNotIn('id', $productIdsToExclude)
            ->inRandomOrder()
            ->orderBy('price', 'desc')
            ->limit(4)
            ->get();

        $cart->recommendedProducts = $recommendedProducts;

        return $cart;
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found'
            ]);
        }
        if (!Auth::check()) {
            return response()->json([
                'status' => false,
                'message' => 'يرجى تسجيل الدخول لإضافة المنتجات إلى سلة التسوق',
                'auth_required' => true
            ]);
        }
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id()
        ]);
        $firstColor = $product->colors()->first();
        $firstSize = $product->sizes()->first();
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->where('color_id', $firstColor->id)
            ->first();
        if ($cartItem) {
            $cartItem->quantity = $cartItem->quantity + 1;
            $cartItem->save();
            $message = 'تم تحديث كمية المنتج في السلة!';
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'color_id' => $firstColor->id ?? null,
                'size_id' => $firstSize->id ?? null,
                'quantity' => 1,
                'price' => $product->getCurrentPrice()
            ]);
            $message = 'تم إضافة المنتج إلى سلة التسوق بنجاح!';
        }
        return response()->json([
            'status' => true,
            'message' => $message,
            'cart_count' => $cart->cartItems->sum('quantity')
        ]);
    }

    public function clearCart()
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => false,
                'message' => 'يرجى تسجيل الدخول',
                'auth_required' => true
            ]);
        }

        $cart = Cart::where('user_id', Auth::id())->first();
        if (!$cart) {
            return response()->json([
                'status' => false,
                'message' => 'السلة فارغة بالفعل'
            ]);
        }
        $cart->cartItems()->delete();
        $cart->delete();
        return response()->json([
            'status' => true,
            'message' => 'تم إفراغ السلة بنجاح',
            'cart_count' => 0
        ]);
    }

    public function removeFromCart($id)
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => false,
                'message' => 'يرجى تسجيل الدخول',
                'auth_required' => true
            ]);
        }

        $cartItem = CartItem::whereHas('cart', function ($query) {
            $query->where('user_id', Auth::id());
        })->where('id', $id)->first();

        if (!$cartItem) {
            return response()->json([
                'status' => false,
                'message' => 'العنصر غير موجود في السلة'
            ]);
        }

        $cartItem->delete();

        // Get updated cart count
        $cart = Cart::where('user_id', Auth::id())->first();
        $cartCount = $cart ? $cart->cartItems->sum('quantity') : 0;

        return response()->json([
            'status' => true,
            'message' => 'تم حذف المنتج من السلة بنجاح',
            'cart_count' => $cartCount
        ]);
    }

    public function getTotal()
    {
        if (!Auth::check()) {
            return 0;
        }
        $cart = Cart::where('user_id', Auth::id())->first();
        if (!$cart) {
            return 0;
        }
        return $cart->cartItems->sum(function ($item) {
            return ($item->product->getCurrentPrice() * $item->quantity) - ($item->product->getDiscountAmount() * $item->quantity);
        });
    }

    public function checkout(Request $request)
    {
        try {
            // 1. Check user authentication
            if (!Auth::check()) {
                return response()->json([
                    'status' => false,
                    'message' => 'يرجى تسجيل الدخول لإتمام عملية الشراء',
                    'auth_required' => true
                ], 401);
            }

            $user = Auth::user();

            // Get user's cart
            $cart = Cart::with(['cartItems.product', 'cartItems.color.color'])
                ->where('user_id', $user->id)
                ->first();

            if (!$cart || $cart->cartItems->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'message' => 'السلة فارغة'
                ], 400);
            }

            // Validate shipping zone
            $shippingZoneId = $request->input('shipping_zone_id');
            $shippingZone = ShippingZone::find($shippingZoneId);

            if (!$shippingZone) {
                return response()->json([
                    'status' => false,
                    'message' => 'منطقة الشحن غير صحيحة'
                ], 400);
            }

            // Check if this is the user's first order
            $isFirstOrder = !Order::where('user_id', $user->id)->exists();

            DB::beginTransaction();

            try {
                // 2. Check product quantities and availability
                $stockErrors = [];
                $totalPrice = 0;

                foreach ($cart->cartItems as $cartItem) {
                    $product = $cartItem->product;
                    $color = $cartItem->color;

                    // Check if product is active
                    if (!$product->is_active) {
                        $stockErrors[] = "المنتج {$product->name_ar} غير متوفر حالياً";
                        continue;
                    }

                    // Check color availability (assuming you have stock management for colors)
                    // For now, we'll assume availability based on product_colors table existence
                    if ($color && !ProductColor::where('product_id', $product->id)
                            ->where('color_id', $color->color_id)
                            ->exists()) {
                        $stockErrors[] = "اللون المحدد للمنتج {$product->name_ar} غير متوفر";
                        continue;
                    }

                    $totalPrice += ($product->getCurrentPrice() * $cartItem->quantity)
                        - ($product->getDiscountAmount() * $cartItem->quantity);
                }

                if (!empty($stockErrors)) {
                    DB::rollBack();
                    return response()->json([
                        'status' => false,
                        'message' => 'بعض المنتجات غير متوفرة',
                        'errors' => $stockErrors
                    ], 400);
                }

                $shippingCost = $isFirstOrder ? 0 : $shippingZone->shipping_cost;
                $finalTotal = $totalPrice + $shippingCost;
                $orderNumber = Order::generateOrderNumber();
                $order = Order::create([
                    'user_id' => $user->id,
                    'order_number' => $orderNumber,
                    'total_price' => $finalTotal,
                    'shipping_zone_id' => $shippingZone->id,
                    'status' => 'pending'
                ]);

                foreach ($cart->cartItems as $cartItem) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $cartItem->product_id,
                        'color_id' => $cartItem->color_id,
                        'size_id' => $cartItem->size_id,
                        'quantity' => $cartItem->quantity,
                        'price' => $cartItem->product->getCurrentPrice()
                    ]);
                    Inventory::where('product_id', $cartItem->product_id)
                        ->where('color_id', $cartItem->color->color_id)
                        ->decrement('quantity', $cartItem->quantity);
                }

                $cart->cartItems()->delete();
                $cart->delete();
                try {
                    Mail::to($user->email)->send(new OrderCreated($order));
                } catch (\Throwable $th) {
                    // throw $th;
                }
                DB::commit();

                $response = [
                    'status' => true,
                    'message' => 'تم إنشاء الطلب بنجاح',
                    'order_id' => $order->id,
                    'total_price' => $finalTotal,
                    'shipping_cost' => $shippingCost,
                    'is_first_order' => $isFirstOrder
                ];

                return response()->json($response);
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'حدث خطأ أثناء إنشاء الطلب',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
