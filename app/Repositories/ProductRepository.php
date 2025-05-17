<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAllProducts()
    {
        $products = $this
            ->product
            ->with('category', 'brand', 'productImages', 'reviews', 'colors', 'sizes', 'inventory')
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        return $products;
    }

    public function getProductById($productId)
    {
        $product = $this
            ->product
            ->with('productImages', 'reviews', 'category', 'brand', 'discounts', 'colors.color', 'sizes.size', 'inventory', 'relatedProducts')
            ->find($productId);
        return $product;
    }

    public function createProduct()
    {
        $product = new $this->product();
        return $product;
    }

    public function storeProduct(array $productDetails)
    {
        $product = $this->product->create($productDetails);
        return $product;
    }

    public function deleteProduct($productId)
    {
        $this->product->destroy($productId);
    }

    public function editProduct($productId)
    {
        $product = $this->product->find($productId);
        return $product;
    }

    public function updateProduct($productId, array $newDetails)
    {
        $product = $this->product->find($productId);
        $product->update($newDetails);
        return $product;
    }
}
