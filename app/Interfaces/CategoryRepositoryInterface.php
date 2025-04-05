<?php

namespace App\Interfaces;

use App\Http\Requests\Dashboard\Category\StoreCategoryRequest;
use App\Http\Requests\Dashboard\Category\UpdateCategoryRequest;
use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function index();
    public function show(Category $category);
    public function create();
    public function store(StoreCategoryRequest $request);
    public function edit(Category $category);
    public function update(UpdateCategoryRequest $request, Category $category);
    public function destroy(Category $category);
}
