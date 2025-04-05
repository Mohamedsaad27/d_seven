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

    public function index()
    {
        $products = $this->product->paginate(10);
        return $products;
    }

    public function create() {}

    public function show(Product $product)
    {
        $product = Product::with('category', 'brand', 'productImages', 'reviews', 'colors', 'sizes')->find($product->id);
        return $product;
    }

    // public function store(StoreProductRequest $request){
    //     $data = $request->validated();
    //     try{
    //      DB::beginTransaction();
    //       $product = Product::create([
    //         'name_en' => $data['name_en'],
    //         'name_ar' => $data['name_ar'],
    //         'price' => $data['price'],
    //         'description_en' => $data['description_en'],
    //         'description_ar' => $data['description_ar'],
    //         'category_id' => $data['category_id'],
    //         'brand_id' => $data['brand_id'],
    //         'is_active' => $data['is_active'],
    //       ]);
    //       foreach($data['colors'] as $color){
    //         $product->colors()->attach($color);
    //       }
    //       foreach($data['sizes'] as $size){
    //         $product->sizes()->attach($size);
    //       }
    //       foreach($data['images'] as $image){
    //         $imageName = time().'.'.$image->getClientOriginalExtension();
    //         $imagePath = 'Uploads/products/'.$product->id.'/'.$imageName;
    //         $image->move(public_path('Uploads/products/'.$product->id), $imageName);
    //         ProductImage::create([
    //             'product_id' => $product->id,
    //             'image_url' => $imagePath,
    //             'is_primary' => false,
    //         ]);
    //       }

    //       DB::commit();
    //       return redirect()->route('product.index')->with('success', 'Product created successfully');
    //     }catch(\Exception $e){
    //         DB::rollBack();
    //         Log::error($e->getMessage());
    //         return redirect()->back()->with('error', 'Failed to create product');
    //     }
    // }

    //     public function store(StoreProductRequest $request)
    // {
    //     $validated = $request->validated();
    //     // Create product
    //     $product = Product::create([
    //         'name_ar' => $validated['name_ar'],
    //         'name_en' => $validated['name_en'],
    //         'description_ar' => $validated['description_ar'],
    //         'description_en' => $validated['description_en'],
    //         'price' => $validated['price'],
    //         'category_id' => $validated['category_id'],
    //         'brand_id' => $validated['brand_id'],
    //         'is_active' => $validated['is_active'],
    //     ]);

    //     // Add product colors
    //     foreach ($validated['colors'] as $colorId) {
    //         ProductColor::create([
    //             'product_id' => $product->id,
    //             'color_id' => $colorId,
    //         ]);
    //     }

    //     // Add product sizes and additional prices
    //     foreach ($validated['sizes'] as $index => $size) {
    //         ProductSize::create([
    //             'product_id' => $product->id,
    //             'size' => $size,
    //             'additional_price' => $validated['additional_prices'][$index] ?? 0,
    //         ]);
    //     }

    //     // Add product images
    //     foreach($validated['images'] as $image){
    //         $imageName = time().'.'.$image->getClientOriginalExtension();
    //         $imagePath = 'Uploads/products/'.$product->id.'/'.$imageName;
    //         $image->move(public_path('Uploads/products/'.$product->id), $imageName);
    //         ProductImage::create([
    //             'product_id' => $product->id,
    //             'image_url' => $imagePath,
    //             'is_primary' => false,
    //         ]);
    //       }

    //     // Add inventory
    //     foreach ($validated['inventory_colors'] as $index => $colorId) {
    //         Inventory::create([
    //             'product_id' => $product->id,
    //             'product_color_id' => $colorId,
    //             'product_size_id' => $validated['inventory_sizes'][$index],
    //             'quantity' => $validated['quantities'][$index],
    //         ]);
    //     }

    //     return redirect()->route('products.index')
    //         ->with('success', 'Product created successfully.');
    // }
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
            'is_active' => $data['is_active'],
        ]);

        // Add product colors
        foreach ($data['colors'] as $colorId) {
            ProductColor::create([
                'product_id' => $product->id,
                'color_id' => $colorId,
            ]);
        }

        // Add product sizes and additional prices
        foreach ($data['sizes'] as $index => $size) {
            ProductSize::create([
                'product_id' => $product->id,
                'size_id' => $size,
                'additional_price' => $data['additional_prices'][$index] ?? 0,
            ]);
        }

        // Add product images
        foreach ($data['images'] as $image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'Uploads/products/' . $product->id . '/' . $imageName;
            $image->move(public_path('Uploads/products/' . $product->id), $imageName);
            ProductImage::create([
                'product_id' => $product->id,
                'image_url' => $imagePath,
                'is_primary' => false,
            ]);
        }
        // dd($data['inventory_sizes'][0]);
        // Add inventory
        foreach ($data['inventory_colors'] as $index => $colorId) {
            Inventory::create([
                'product_id' => $product->id,
                'color_id' => $colorId,
                'size_id' => $data['inventory_sizes'][$index],
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
