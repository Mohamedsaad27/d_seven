<?php

namespace App\Repositories;

use App\Http\Requests\Dashboard\Brand\StoreBrandRequest;
use App\Http\Requests\Dashboard\Brand\UpdateBrandRequest;
use App\Interfaces\BrandRepositoryInterface;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

class BrandRepository implements BrandRepositoryInterface
{
    protected $model;

    public function __construct(Brand $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->orderBy('created_at', 'desc')->get();
    }

    public function show(Brand $brand)
    {
        return $brand;
    }

    public function create() {}

    public function store(StoreBrandRequest $request)
    {
        $data = $request->validated();
        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = 'Uploads/Brands/' . $imageName;
                $image->move(public_path('Uploads/Brands/'), $imageName);
                $data['image'] = $imagePath;
            }
            $this->model->create($data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(Brand $brand)
    {
        return $brand;
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $data = $request->validated();
        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = 'Uploads/Brands/' . $imageName;
                $image->move(public_path('Uploads/Brands/'), $imageName);
                $data['image'] = $imagePath;
                // Remove old image
                if ($brand->image && file_exists(public_path($brand->image))) {
                    unlink(public_path($brand->image));
                }
            }
            $brand->update($data);
            return redirect()->route('brand.index')->with('success', 'Brand updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Brand $brand)
    {
        try {
            DB::beginTransaction();
            if ($brand->image && file_exists(public_path($brand->image))) {
                unlink(public_path($brand->image));
            }
            $brand->delete();
            DB::commit();
            return redirect()->route('brand.index')->with('success', 'Brand deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
