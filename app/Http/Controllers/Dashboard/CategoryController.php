<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\CategoryRepositoryInterface;
use App\Http\Requests\Dashboard\Category\StoreCategoryRequest;
use App\Http\Requests\Dashboard\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    protected  $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository){
        $this->categoryRepository = $categoryRepository;
    }
    public function index(){
        $categories = $this->categoryRepository->index();
        return view('dashboard.category.index', compact('categories'));
    }
    public function create(){
        return $this->categoryRepository->create();
    }
    public function store(StoreCategoryRequest $request){
        return $this->categoryRepository->store($request);
    }
    public function edit(Category $category){
        return $this->categoryRepository->edit($category);
    }
    public function update(UpdateCategoryRequest $request, Category $category){
        return $this->categoryRepository->update($request, $category);
    }
    public function destroy(Category $category){
        return $this->categoryRepository->destroy($category);
    }
    public function show(Category $category){
        return $this->categoryRepository->show($category);
    }
}
