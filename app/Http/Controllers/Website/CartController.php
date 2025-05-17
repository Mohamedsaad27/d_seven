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
        $this->cartRepository->addToCart($id);
        return response()->json([
            'status' => true,
            'message' => 'Product added to cart successfully',
            'cart_count' => auth()->user()->cart->cartItems->sum('quantity')
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
