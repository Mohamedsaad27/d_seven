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
        $this->cartRepository->removeFromCart($id);
        return redirect()->back();
    }

    public function clearCart()
    {
        $this->cartRepository->clearCart();
        return redirect()->back();
    }

    public function getTotal()
    {
        $total = $this->cartRepository->getTotal();
        return $total;
    }
}
