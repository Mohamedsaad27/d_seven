<?php

namespace App\Interfaces;

use App\Http\Requests\Dashboard\Product\StoreProductRequest;
use App\Http\Requests\Dashboard\Product\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

interface ProductDashboardInterface
{
    public function index();
    public function create();
    public function show(Product $product);
    public function store(Request $request);
    public function edit(Product $product);
    public function update(UpdateProductRequest $request, Product $product);
    public function destroy(Product $product);
}
