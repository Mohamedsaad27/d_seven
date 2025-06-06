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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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

    // public function store(Request $request)
    // {
    //     try {
    //         $data = $request->all();

    //         DB::beginTransaction();

    //         $product = Product::create([
    //             'name_ar' => $data['name_ar'],
    //             'name_en' => $data['name_en'],
    //             'description_ar' => $data['description_ar'],
    //             'description_en' => $data['description_en'],
    //             'price' => $data['price'],
    //             'category_id' => $data['category_id'],
    //             'brand_id' => $data['brand_id'],
    //             'is_active' => $data['is_active'] ?? 0,
    //         ]);

    //         if (isset($data['colors']) && count($data['colors']) > 0) {
    //             foreach ($data['colors'] as $colorId) {
    //                 ProductColor::create([
    //                     'product_id' => $product->id,
    //                     'color_id' => $colorId,
    //                 ]);
    //             }
    //         } else {
    //             DB::rollBack();
    //             return redirect()
    //                 ->back()
    //                 ->withInput()
    //                 ->with('error', 'Please select at least one color');
    //         }

    //         if (isset($data['images']) && count($data['images']) > 0) {
    //             $uploadPath = public_path('uploads/products/' . $product->id);
    //             if (!file_exists($uploadPath)) {
    //                 mkdir($uploadPath, 0755, true);
    //             }

    //             foreach ($data['images'] as $key => $image) {
    //                 $imageName = time() . '_' . $key . '.' . $image->getClientOriginalExtension();
    //                 $imagePath = 'uploads/products/' . $product->id . '/' . $imageName;

    //                 // Move the uploaded file
    //                 $image->move($uploadPath, $imageName);

    //                 ProductImage::create([
    //                     'product_id' => $product->id,
    //                     'image_url' => $imagePath,
    //                     'is_primary' => $key == 0 ? true : false,
    //                 ]);
    //             }
    //         }

    //         if (isset($data['inventory_colors']) && count($data['inventory_colors']) > 0) {
    //             foreach ($data['inventory_colors'] as $index => $colorId) {
    //                 Inventory::create([
    //                     'product_id' => $product->id,
    //                     'color_id' => $colorId,
    //                     'size_id' => $data['inventory_sizes'][$index] ?? null,
    //                     'quantity' => $data['quantities'][$index] ?? 0,
    //                 ]);
    //             }
    //         }

    //         DB::commit();

    //         return redirect()
    //             ->route('products.index')
    //             ->with('success', 'Product created successfully.');
    //     } catch (\Exception $e) {
    //         DB::rollBack();

    //         // Log the error for debugging
    //         \Log::error('Product creation failed: ' . $e->getMessage(), [
    //             'user_id' => auth()->id(),
    //             'request_data' => $request->except(['images']),  // Exclude images from log
    //             'error_trace' => $e->getTraceAsString()
    //         ]);

    //         return redirect()
    //             ->back()
    //             ->withInput()
    //             ->with('error', 'Failed to create product. Please try again.');
    //     }
    // }

    public function store(StoreProductRequest $request)
    {
        try {
            $validatedData = $request->validated();

            DB::beginTransaction();

            // Create product with slugs
            $product = Product::create([
                'name_ar' => $validatedData['name_ar'],
                'name_en' => $validatedData['name_en'],
                'slug_ar' => Str::slug($validatedData['name_ar']),
                'slug_en' => Str::slug($validatedData['name_en']),
                'description_ar' => $validatedData['description_ar'],
                'description_en' => $validatedData['description_en'],
                'price' => $validatedData['price'],
                'category_id' => $validatedData['category_id'],
                'brand_id' => $validatedData['brand_id'],
                'is_active' => $validatedData['is_active'] ?? 0,
            ]);

            // Handle product colors
            $colorData = [];
            foreach ($validatedData['colors'] as $colorId) {
                $colorData[] = [
                    'product_id' => $product->id,
                    'color_id' => $colorId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            ProductColor::insert($colorData);

            // Handle images upload
            if (isset($validatedData['images']) && count($validatedData['images']) > 0) {
                $this->handleImageUpload($product, $validatedData['images']);
            }

            // Handle inventory
            $this->handleInventory($product, $validatedData['inventory_colors'], $validatedData['quantities']);

            DB::commit();

            return redirect()
                ->route('products.index')
                ->with('success', 'Product created successfully with all validations passed.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Log the error for debugging
            \Log::error('Product creation failed: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'request_data' => $request->except(['images']),
                'error_trace' => $e->getTraceAsString()
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Failed to create product. Please check all fields and try again.');
        }
    }

    /**
     * Handle image upload with validation
     */
    private function handleImageUpload($product, $images)
    {
        $uploadPath = public_path('uploads/products/' . $product->id);

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $imageData = [];
        foreach ($images as $key => $image) {
            // Generate unique filename
            $imageName = time() . '_' . $key . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $imagePath = 'uploads/products/' . $product->id . '/' . $imageName;

            // Move the uploaded file
            if ($image->move($uploadPath, $imageName)) {
                $imageData[] = [
                    'product_id' => $product->id,
                    'image_url' => $imagePath,
                    'is_primary' => $key == 0 ? 1 : 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        if (!empty($imageData)) {
            ProductImage::insert($imageData);
        }
    }

    /**
     * Handle inventory creation with validation
     */
    private function handleInventory($product, $inventoryColors, $quantities)
    {
        $inventoryData = [];

        foreach ($inventoryColors as $index => $colorId) {
            if (isset($quantities[$index]) && $quantities[$index] >= 0) {
                $inventoryData[] = [
                    'product_id' => $product->id,
                    'color_id' => $colorId,
                    'size_id' => null,  // Assuming no sizes for now
                    'quantity' => $quantities[$index],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        if (!empty($inventoryData)) {
            Inventory::insert($inventoryData);
        }
    }

    public function edit(Product $product)
    {
        $product = Product::with('category', 'brand', 'productImages', 'reviews', 'colors', 'sizes', 'inventory')->find($product->id);
        return $product;
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->all();

        DB::beginTransaction();
        try {
            // Update product basic info
            $product->update([
                'name_ar' => $data['name_ar'],
                'name_en' => $data['name_en'],
                'description_ar' => $data['description_ar'],
                'description_en' => $data['description_en'],
                'price' => $data['price'],
                'category_id' => $data['category_id'],
                'brand_id' => $data['brand_id'],
                'is_active' => $data['is_active'] ?? 0,
            ]);

            // Update product colors
            // First remove all existing colors
            ProductColor::where('product_id', $product->id)->delete();

            // Then add new colors
            foreach (isset($data['colors']) ? $data['colors'] : [] as $colorId) {
                ProductColor::create([
                    'product_id' => $product->id,
                    'color_id' => $colorId,
                ]);
            }

            // Handle images
            if (isset($data['images']) && count($data['images']) > 0) {
                // Handle new images
                foreach ($data['images'] as $key => $image) {
                    $imageName = time() . '_' . $key . '.' . $image->getClientOriginalExtension();
                    $imagePath = 'uploads/products/' . $product->id . '/' . $imageName;

                    // Create directory if it doesn't exist
                    if (!file_exists(public_path('uploads/products/' . $product->id))) {
                        mkdir(public_path('uploads/products/' . $product->id), 0755, true);
                    }

                    $image->move(public_path('uploads/products/' . $product->id), $imageName);

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_url' => $imagePath,
                        'is_primary' => $key == 0 && !ProductImage::where('product_id', $product->id)->where('is_primary', true)->exists() ? true : false,
                    ]);
                }
            }

            // Handle delete image IDs if provided
            if (isset($data['delete_image_ids']) && !empty($data['delete_image_ids'])) {
                $imagesToDelete = ProductImage::whereIn('id', $data['delete_image_ids'])->get();

                foreach ($imagesToDelete as $image) {
                    // Delete physical file
                    if (file_exists(public_path($image->image_url))) {
                        unlink(public_path($image->image_url));
                    }

                    // Delete record
                    $image->delete();
                }
            }

            // Set primary image if specified
            if (isset($data['primary_image_id'])) {
                // First reset all images to non-primary
                ProductImage::where('product_id', $product->id)->update(['is_primary' => false]);

                // Then set the selected one as primary
                ProductImage::where('id', $data['primary_image_id'])->update(['is_primary' => true]);
            }

            Inventory::where('product_id', $product->id)->delete();

            // Add new inventory
            if (isset($data['inventory_colors']) && isset($data['quantities'])) {
                foreach ($data['inventory_colors'] as $index => $colorId) {
                    Inventory::create([
                        'product_id' => $product->id,
                        'color_id' => $colorId,
                        'size_id' => $data['inventory_sizes'][$index] ?? null,
                        'quantity' => $data['quantities'][$index],
                    ]);
                }
            }

            DB::commit();

            return redirect()
                ->route('products.index')
                ->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while updating the product: ' . $e->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        try {
            DB::beginTransaction();
    
            // Delete physical image files
            $productImages = ProductImage::where('product_id', $product->id)->get();
            foreach ($productImages as $image) {
                $imagePath = public_path($image->image_url);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
    
            // Delete product images records
            ProductImage::where('product_id', $product->id)->delete();
    
            // Delete product colors
            ProductColor::where('product_id', $product->id)->delete();
    
            // Delete inventory records
            Inventory::where('product_id', $product->id)->delete();
    
            // Delete the product directory if it exists and is empty
            $productDirectory = public_path('uploads/products/' . $product->id);
            if (is_dir($productDirectory)) {
                // Check if directory is empty
                $files = array_diff(scandir($productDirectory), array('.', '..'));
                if (empty($files)) {
                    rmdir($productDirectory);
                }
            }
    
            // Finally delete the product itself
            $product->delete();
    
            DB::commit();
    
            return redirect()
                ->route('products.index')
                ->with('success', 'Product deleted successfully.');
    
        } catch (\Exception $e) {
            DB::rollBack();
    
            // Log the error for debugging
            Log::error('Product deletion failed: ' . $e->getMessage(), [
                'product_id' => $product->id,
                'user_id' => auth()->id(),
                'error_trace' => $e->getTraceAsString()
            ]);
    
            return redirect()
                ->back()
                ->with('error', 'Failed to delete product. Please try again.');
        }
    }
}
