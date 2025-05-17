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
        $authUser = Auth::user()->id;
        $cart = Cart::with(['cartItems.product.productImages', 'cartItems.product.discounts', 'cartItems.color.color', 'cartItems.product.brand'])
            ->where('user_id', $authUser)
            ->orderBy('created_at', 'desc')
            ->first();
        $recommendedProducts = Product::where('is_active', true)
            ->where('id', '!=', $cart->cartItems->pluck('product_id')->toArray())
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
        if(!$product) {
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
            ->first();
        if($cartItem) {
            $cartItem->quantity = $cartItem->quantity + 1;
            $cartItem->save();
        }
        else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'color_id' => $product->colors->first()->id ?? null,
                'size_id' => null,
                'quantity' => 1,
                'price' => $product->price
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => 'Product added to cart successfully',
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
