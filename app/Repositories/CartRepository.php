<?php

namespace App\Repositories;

use App\Interfaces\CartRepositoryInterface;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartRepository implements CartRepositoryInterface
{
    protected $cart;
    public function __construct(Cart $cart){
        $this->cart = $cart;
    }
    public function getCart()
    {
        
    }
    public function addToCart($id)
    {
        // TODO: Implement addToCart() method.
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
