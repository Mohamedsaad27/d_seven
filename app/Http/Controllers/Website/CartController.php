<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Interfaces\CartRepositoryInterface;
use App\Models\ShippingZone;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartRepository;

    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function getCart()
    {
        $cart = $this->cartRepository->getCart();
        $shippingZones = ShippingZone::all();
        return view('website.cart', compact('cart', 'shippingZones'));
    }

    public function addToCart($id)
    {
        // Call repository method to add to cart
        $response = $this->cartRepository->addToCart($id);

        // Decode the JSON response
        $responseData = json_decode($response->getContent(), true);

        // Check if authentication is required
        if (isset($responseData['auth_required']) && $responseData['auth_required']) {
            return response()->json([
                'status' => false,
                'message' => $responseData['message'] ?? 'يرجى تسجيل الدخول لإضافة المنتجات إلى سلة التسوق',
                'auth_required' => true
            ]);
        }

        // Return original response
        return response()->json([
            'status' => $responseData['status'] ?? false,
            'message' => $responseData['message'] ?? 'تمت إضافة المنتج إلى سلة التسوق بنجاح',
            'cart_count' => $responseData['cart_count'] ?? 0
        ]);
    }

    public function removeFromCart($id)
    {
        try {
            // Call repository method to remove from cart
            $response = $this->cartRepository->removeFromCart($id);
            $responseData = json_decode($response->getContent(), true);

            // For AJAX requests
            if (request()->ajax()) {
                return response()->json([
                    'status' => $responseData['status'] ?? false,
                    'message' => $responseData['message'] ?? 'تم حذف المنتج من السلة',
                    'cart_count' => $responseData['cart_count'] ?? 0
                ]);
            }

            // For regular form requests
            if ($responseData['status'] ?? false) {
                return redirect()->back()->with('success', $responseData['message'] ?? 'تم حذف المنتج من السلة بنجاح');
            } else {
                return redirect()->back()->with('error', $responseData['message'] ?? 'حدث خطأ أثناء حذف المنتج');
            }
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'status' => false,
                    'message' => 'حدث خطأ أثناء حذف المنتج',
                    'error' => $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'حدث خطأ أثناء حذف المنتج');
        }
    }

    public function clearCart()
    {
        try {
            // Call repository method to clear cart
            $response = $this->cartRepository->clearCart();
            $responseData = json_decode($response->getContent(), true);

            // For AJAX requests
            if (request()->ajax()) {
                return response()->json([
                    'status' => $responseData['status'] ?? false,
                    'message' => $responseData['message'] ?? 'تم إفراغ السلة',
                    'cart_count' => $responseData['cart_count'] ?? 0
                ]);
            }

            // For regular form requests
            if ($responseData['status'] ?? false) {
                return redirect()->back()->with('success', $responseData['message'] ?? 'تم إفراغ السلة بنجاح');
            } else {
                return redirect()->back()->with('error', $responseData['message'] ?? 'حدث خطأ أثناء إفراغ السلة');
            }
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'status' => false,
                    'message' => 'حدث خطأ أثناء إفراغ السلة',
                    'error' => $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'حدث خطأ أثناء إفراغ السلة');
        }
    }

    public function getTotal()
    {
        try {
            $total = $this->cartRepository->getTotal();
            return response()->json([
                'status' => true,
                'total' => $total
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'حدث خطأ أثناء حساب المجموع',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function checkout(Request $request)
    {
        // Validate request
        $request->validate([
            'shipping_zone_id' => 'required|exists:shipping_zones,id'
        ]);

        try {
            $response = $this->cartRepository->checkout($request);
            $responseData = json_decode($response->getContent(), true);

            // For AJAX requests
            if ($request->ajax()) {
                return response()->json($responseData, $response->getStatusCode());
            }

            // For regular form requests
            if ($responseData['status'] ?? false) {
                $message = $responseData['message'] ?? 'تم إنشاء الطلب بنجاح';

                if ($responseData['is_first_order'] ?? false) {
                    $message .= ' - مبروك! هذا أول طلب لك والشحن مجاني!';
                }

                return redirect()
                    ->route('orders.show', $responseData['order_id'])
                    ->with('success', $message);
            } else {
                return redirect()
                    ->back()
                    ->withErrors($responseData['message'] ?? 'حدث خطأ أثناء إنشاء الطلب')
                    ->withInput();
            }
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'status' => false,
                    'message' => 'حدث خطأ أثناء إنشاء الطلب',
                    'error' => $e->getMessage()
                ], 500);
            }

            return redirect()
                ->back()
                ->with('error', 'حدث خطأ أثناء إنشاء الطلب')
                ->withInput();
        }
    }

    public function showCheckout()
    {
        if (!auth()->check()) {
            return redirect()
                ->route('login')
                ->with('error', 'يرجى تسجيل الدخول لإتمام عملية الشراء');
        }

        $cart = $this->cartRepository->getCart();

        if (!$cart || $cart->cartItems->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'السلة فارغة');
        }

        $shippingZones = ShippingZone::all();

        return view('website.checkout', compact('cart', 'shippingZones'));
    }
}
