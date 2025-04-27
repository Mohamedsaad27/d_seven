<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Interfaces\DiscountRepositoryInterface;
use App\Models\Discount;
use App\Models\Product;
use App\Models\ProductDiscount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    private $discountRepository;

    public function __construct(DiscountRepositoryInterface $discountRepository)
    {
        $this->discountRepository = $discountRepository;
    }

    public function index()
    {
        $discounts = $this->discountRepository->getAllDiscounts();
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('dashboard.discounts.index', compact('discounts', 'products'));
    }

    public function create()
    {
        return view('dashboard.discounts.create');
    }

    public function store(DiscountRequest $request)
    {
        $this->discountRepository->createDiscount($request);
        return redirect()->route('discounts.index')->with('success', 'Discount created successfully');
    }

    public function edit(Discount $discount)
    {
        return view('dashboard.discounts.edit', compact('discount'));
    }

    public function update(Discount $discount, DiscountRequest $request)
    {
        $this->discountRepository->updateDiscount($discount, $request);
        return redirect()->route('discounts.index')->with('success', 'Discount updated successfully');
    }

    public function destroy(Discount $discount)
    {
        $this->discountRepository->deleteDiscount($discount);
        return redirect()->route('discounts.index')->with('success', 'Discount deleted successfully');
    }

    public function getAssignedProducts(Discount $discount)
    {
        $productIds = ProductDiscount::where('discount_id', $discount->id)
            ->pluck('product_id');

        return response()->json($productIds);
    }

    public function assignProducts(Request $request)
    {
        $validated = $request->validate([
            'discount_id' => 'required|exists:discounts,id',
            'product_ids' => 'required|array',
            'product_ids.*' => 'exists:products,id',
        ]);

        $discountId = $validated['discount_id'];
        $productIds = $validated['product_ids'];

        // Remove all existing product assignments for this discount
        ProductDiscount::where('discount_id', $discountId)->delete();

        // Add new product assignments
        $productDiscounts = [];
        foreach ($productIds as $productId) {
            $productDiscounts[] = [
                'product_id' => $productId,
                'discount_id' => $discountId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        ProductDiscount::insert($productDiscounts);

        return redirect()
            ->route('discounts.index')
            ->with('success', 'Products successfully assigned to discount');
    }

    public function removeProduct(Request $request)
    {
        $validated = $request->validate([
            'discount_id' => 'required|exists:discounts,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $discountId = $validated['discount_id'];
        $productId = $validated['product_id'];

        ProductDiscount::where('discount_id', $discountId)
            ->where('product_id', $productId)
            ->delete();

        return redirect()
            ->route('discounts.index')
            ->with('success', 'Product successfully removed from discount');
    }

    public function searchOnProducts(Request $request)
    {
        $search = $request->search;
        $products = Product::where('name_en', 'like', "%{$search}%")->orWhere('name_ar', 'like', "%{$search}%")->get();
        return response()->json($products);
    }
}
