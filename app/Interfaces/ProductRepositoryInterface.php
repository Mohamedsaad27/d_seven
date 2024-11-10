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
    // public function getFeturedProducts();
    // public function getProductByCategory($categoryId);
    // public function getProductBySubCategory($subCategoryId);
    // public function getProductByBrand($brandId);
    // public function getProductByColor($color);
    // public function getProductBySize($size);
    // public function getProductBySearch($search);
}
