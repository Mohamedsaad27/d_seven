<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Product\StoreProductRequest;
use App\Interfaces\BrandRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ProductDashboardInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;
    protected $brandRepository;

    public function __construct(ProductDashboardInterface $productDashboardRepository, CategoryRepositoryInterface $categoryRepository, BrandRepositoryInterface $brandRepository)
    {
        $this->productDashboardRepository = $productDashboardRepository;
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
    }

    public function index(Request $request)
    {
        $products = $this->productDashboardRepository->index($request);
        return $products;
    }

    public function create()
    {
        $categories = $this->categoryRepository->index();
        $brands = $this->brandRepository->index();
        $colors = Color::all();
        $sizes = Size::all();
        return view('dashboard.product.create', compact('categories', 'brands', 'colors', 'sizes'));
    }

    public function store(Request $request)
    {
        $this->productDashboardRepository->store($request);
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function edit(Product $product)
    {
        $product = $this->productDashboardRepository->edit($product);
        $categories = $this->categoryRepository->index();
        $brands = $this->brandRepository->index();
        $colors = Color::all();
        $sizes = Size::all();
        $productColors = $product->colors ?? [];
        $inventory = $product->inventory ?? [];
        return view('dashboard.product.edit', compact('product', 'categories', 'brands', 'colors', 'sizes', 'productColors', 'inventory'));
    }

    public function update(Request $request, Product $product)
    {
        $this->productDashboardRepository->update($request, $product);
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function show(Product $product)
    {
        $product = $this->productDashboardRepository->show($product);
        return view('dashboard.product.show', compact('product'));
    }
}
