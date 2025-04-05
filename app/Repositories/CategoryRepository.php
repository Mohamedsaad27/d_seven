<?php

namespace App\Repositories;

use App\Http\Requests\Dashboard\Category\StoreCategoryRequest;
use App\Http\Requests\Dashboard\Category\UpdateCategoryRequest;
use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }
    public function index(){
        $categories = $this->model->all();
        return $categories;
    }
    public function show(Category $category){
        return view('dashboard.category.show', compact('category'));
    }
    public function create(){
        $categories = $this->model->get();
        return view('dashboard.category.create', compact('categories'));
    }
    public function store(StoreCategoryRequest $request){
        $validated = $request->validated();
        try{
            if($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $imagePath = 'Uploads/Categories/'.$imageName;
                $image->move(public_path('Uploads/Categories/'), $imageName);
                $validated['image'] = $imagePath;
            }
            $this->model->create($validated);
            return redirect()->route('category.index')->with('success','Category Created Successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Category Creation Failed');
        }
    }
    public function edit(Category $category){
        $parentCategories = $this->model->where('id', '!=', $category->id)->get();
        return view('dashboard.category.edit', compact('category', 'parentCategories'));
    }
    public function update(UpdateCategoryRequest $request, Category $category){
        $validated = $request->validated();
        try{
            if($request->hasFile('image')){
                if($category->image){
                    unlink(public_path($category->image));
                }
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $imagePath = 'Uploads/Categories/'.$imageName;
                $image->move(public_path('Uploads/Categories/'), $imageName);
                $validated['image'] = $imagePath;
            }
            $category->update($validated);
            return redirect()->route('category.index')->with('success','Category Updated Successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Category Update Failed');
        }
    }
    public function destroy(Category $category){
        try{
            if($category->image){
            unlink(public_path($category->image));
            }
            $category->delete();
            return redirect()->route('category.index')->with('success','Category Deleted Successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Category Deletion Failed');
        }
    }
}
