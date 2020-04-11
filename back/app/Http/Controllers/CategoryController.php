<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }

    public function store(CategoryRequest $request)
    {
        return new CategoryResource(Category::makeOne($request->validated()));
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category = $category->updateMe($request->validated());

        return new CategoryResource($category);   
    }

    public function destroy(Category $category)
    {
        return $category->delete();
    }
}
