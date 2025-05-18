<?php

namespace App\Repositories;

use App\Interfaces\CartRepositoryInterface;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

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
            $cart = Cart::with(['cartItems.product.productImages', 'cartItems.product.discounts', 'cartItems.color.color', 'cartItems.product.brand'])
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
                $cart = Cart::with(['cartItems.product.productImages', 'cartItems.product.discounts', 'cartItems.color.color', 'cartItems.product.brand'])
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
        $cart = Cart::where('user_id', Auth::id())->first();
        if (!$cart) {
            $cart = Cart::create([
                'user_id' => auth()->id()
            ]);
        }
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->where('color_id', $product->colors->first()->id)
            ->first();
        if ($cartItem) {
            $cartItem->quantity = $cartItem->quantity + 1;
            $cartItem->save();
            $message = 'تم تحديث كمية المنتج في السلة!';
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'color_id' => $product->colors->first()->id ?? null,
                'size_id' => $product->sizes->first()->id ?? null,
                'quantity' => 1,
                'price' => $product->price
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
        // TODO: Implement clearCart() method.
    }

    public function removeFromCart($id)
    {
        // TODO: Implement removeFromCart() method.
    }

    public function getTotal()
    {
        // TODO: Implement getTotal() method.
    }
}
