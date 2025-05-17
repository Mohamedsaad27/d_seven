<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Interfaces\BrandRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;
    protected $brandRepository;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository, BrandRepositoryInterface $brandRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
    }

    public function index()
    {
        $products = $this->productRepository->getAllProducts();
        $categories = $this->categoryRepository->index();
        $brands = $this->brandRepository->index();
        return view('website.product-list', compact('products', 'categories', 'brands'));
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

    public function getProductsByCategory(Request $request, $category_id)
    {
        $products = Product::with(['productImages', 'discounts', 'category', 'brand'])
            ->where('category_id', $category_id)
            ->where('is_active', 1)
            ->get();

        return response()->json([
            'success' => true,
            'products' => $products,
            'count' => $products->count()
        ]);
    }

    public function getProductsByBrand(Request $request, $brand_id)
    {
        $products = Product::with(['productImages', 'discounts', 'category', 'brand'])
            ->where('brand_id', $brand_id)
            ->where('is_active', 1)
            ->get();

        return response()->json([
            'success' => true,
            'products' => $products,
            'count' => $products->count()
        ]);
    }

    public function getAllProducts(Request $request)
    {
        $products = Product::with(['productImages', 'discounts', 'category', 'brand'])
            ->where('is_active', 1)
            ->get();

        return response()->json([
            'success' => true,
            'products' => $products,
            'count' => $products->count()
        ]);
    }

    public function searchProducts(Request $request)
    {
        $query = $request->input('query');

        $products = Product::with(['productImages', 'discounts', 'category', 'brand'])
            ->where('is_active', 1)
            ->where(function ($q) use ($query) {
                $q
                    ->where('name_ar', 'like', "%{$query}%")
                    ->orWhere('name_en', 'like', "%{$query}%")
                    ->orWhere('description_ar', 'like', "%{$query}%")
                    ->orWhere('description_en', 'like', "%{$query}%");
            })
            ->get();

        return response()->json([
            'success' => true,
            'products' => $products,
            'count' => $products->count()
        ]);
    }
}
