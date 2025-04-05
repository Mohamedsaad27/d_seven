<?php

namespace App\Interfaces;

use App\Models\Brand;
use App\Http\Requests\Dashboard\Brand\StoreBrandRequest;
use App\Http\Requests\Dashboard\Brand\UpdateBrandRequest;

interface BrandRepositoryInterface
{
    public function index();
    public function show(Brand $brand);
    public function create();
    public function store(StoreBrandRequest $request);
    public function edit(Brand $brand);
    public function update(UpdateBrandRequest $request, Brand $brand);
    public function destroy(Brand $brand);
}
