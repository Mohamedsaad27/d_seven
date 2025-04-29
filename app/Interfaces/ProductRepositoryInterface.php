<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function getProductById($productId);
    public function createProduct();
    public function storeProduct(array $productDetails);
    public function deleteProduct($productId);
    public function editProduct($productId);
    public function updateProduct($productId, array $newDetails);
}
