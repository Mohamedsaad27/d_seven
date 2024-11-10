<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\CartRepositoryInterface;

class CartController extends Controller
{
    protected $cartRepository;
    public function __construct(CartRepositoryInterface $cartRepository){
        $this->cartRepository = $cartRepository;
    }
    public function getCart(){
        $cart = $this->cartRepository->getCart();
        return view('website.cart',compact('cart'));
    }
    public function addToCart($id){
        $this->cartRepository->addToCart($id);
        return redirect()->back();
    }
    public function removeFromCart($id){
        $this->cartRepository->removeFromCart($id);
        return redirect()->back();
    }
    public function clearCart(){
        $this->cartRepository->clearCart();
        return redirect()->back();
    }

    public function getTotal(){
        $total = $this->cartRepository->getTotal();
        return $total;
    }
}
