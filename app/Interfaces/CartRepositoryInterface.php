<?php

namespace App\Interfaces;

interface CartRepositoryInterface
{
    public function getCart();
    public function addToCart($id);
    public function removeFromCart($id);
    public function clearCart();
    public function getTotal();
}
