<?php

namespace App\Repositories;

use App\Http\Requests\Dashboard\Product\StoreProductRequest;
use App\Http\Requests\Dashboard\Product\UpdateProductRequest;
use App\Interfaces\ProductDashboardInterface;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductDashboardRepository implements ProductDashboardInterface
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index(Request $request)
    {
        $query = $this->product->with('category', 'brand', 'productImages', 'reviews', 'colors', 'sizes', 'inventory');

        if ($request->has('search')) {
            $query->where(function ($q) use ($request) {
                $q
                    ->where('name_en', 'like', '%' . $request->search . '%')
                    ->orWhere('name_ar', 'like', '%' . $request->search . '%')
                    ->orWhere('description_en', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        if ($request->has('brand') && $request->brand) {
            $query->where('brand_id', $request->brand);
        }

        if ($request->has('status') && $request->status !== '') {
            $query->where('is_active', $request->status);
        }

        if ($request->has('sortBy')) {
            switch ($request->sort) {
                case 'oldest':
                    $query->oldest();
                    break;
                case 'price_high':
                    $query->orderBy('price', 'desc');
                    break;
                case 'price_low':
                    $query->orderBy('price', 'asc');
                    break;
                default:
                    $query->latest();
            }
        } else {
            $query->latest();
        }

        $products = $query->paginate(10)->withQueryString();
        $categories = Category::all();
        $brands = Brand::all();

        return view('dashboard.product.index', compact('products', 'categories', 'brands'));
    }

    public function create() {}

    public function show(Product $product)
    {
        $product = Product::with('category', 'brand', 'productImages', 'reviews', 'colors', 'sizes')->find($product->id);
        return $product;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        // Create product
        DB::beginTransaction();

        $product = Product::create([
            'name_ar' => $data['name_ar'],
            'name_en' => $data['name_en'],
            'description_ar' => $data['description_ar'],
            'description_en' => $data['description_en'],
            'price' => $data['price'],
            'category_id' => $data['category_id'],
            'brand_id' => $data['brand_id'],
            'is_active' => $data['is_active'] ?? 0,
        ]);

        // Add product colors
        foreach ($data['colors'] as $colorId) {
            ProductColor::create([
                'product_id' => $product->id,
                'color_id' => $colorId,
            ]);
        }
        // Add product images
        foreach ($data['images'] as $key => $image) {
            $imageName = time() . '_' . $key . '.' . $image->getClientOriginalExtension();
            $imagePath = 'uploads/products/' . $product->id . '/' . $imageName;
            $image->move(public_path('uploads/products/' . $product->id), $imageName);
            ProductImage::create([
                'product_id' => $product->id,
                'image_url' => $imagePath,
                'is_primary' => $key == 0 ? true : false,
            ]);
        }
        // Add inventory
        foreach ($data['inventory_colors'] as $index => $colorId) {
            Inventory::create([
                'product_id' => $product->id,
                'color_id' => $colorId,
                'size_id' => $data['inventory_sizes'][$index] ?? null,
                'quantity' => $data['quantities'][$index],
            ]);
        }
        DB::commit();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product) {}
    public function update(UpdateProductRequest $request, Product $product) {}
    public function destroy(Product $product) {}
}
