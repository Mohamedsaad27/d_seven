<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\BrandRepositoryInterface;
use App\Http\Requests\Dashboard\Brand\StoreBrandRequest;
use App\Http\Requests\Dashboard\Brand\UpdateBrandRequest;

class BrandController extends Controller
{
    protected $brandRepository;
    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }
    public function index(){
        $brands = $this->brandRepository->index();
        return view('dashboard.brand.index',compact('brands'));
    }
    public function create(){
        return view('dashboard.brand.create');
    }
    public function store(StoreBrandRequest $request){
        $this->brandRepository->store($request);
        return redirect()->route('brand.index')->with('success','Brand created successfully');
    }
    public function show(Brand $brand){
        $brand = $this->brandRepository->edit($brand);
        return view('dashboard.brand.show',compact('brand'));
    }
    public function edit(Brand $brand){
        $brand = $this->brandRepository->edit($brand);
        return view('dashboard.brand.edit',compact('brand'));
    }
    public function update(UpdateBrandRequest $request, Brand $brand){
        $this->brandRepository->update($request,$brand);
        return redirect()->route('brand.index')->with('success','Brand updated successfully');
    }
    public function destroy(Brand $brand){
        $this->brandRepository->destroy($brand);
        return redirect()->route('brand.index')->with('success','Brand deleted successfully');
    }
}
