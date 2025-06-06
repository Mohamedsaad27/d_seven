<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface CartRepositoryInterface
{
    public function getCart();
    public function addToCart($id);
    public function removeFromCart($id);
    public function clearCart();
    public function getTotal();
    public function checkout(Request $request);
}
