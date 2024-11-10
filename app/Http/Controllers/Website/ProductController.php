<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        $products = $this->productRepository->getAllProducts();
        return view('website.product-list', compact('products'));
    }
    public function create()
    {
        $product = $this->productRepository->createProduct();
        return view('website.product-create', compact('product'));
    }
    public function store(Request $request)
    {
        $product = $this->productRepository->storeProduct($request->all());
        return redirect()->route('product.index')->with('success', 'Product created successfully');
    }
    public function show($productId)
    {
        $product = $this->productRepository->getProductById($productId);
        return view('website.single-product', compact('product'));
    }
    public function edit($productId)
    {
        $product = $this->productRepository->editProduct($productId);
        return view('website.product-edit', compact('product'));
    }
    public function update(Request $request, $productId)
    {
        $product = $this->productRepository->updateProduct($productId, $request->all());
        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }
    public function destroy($productId)
    {
        $this->productRepository->deleteProduct($productId);
        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}
