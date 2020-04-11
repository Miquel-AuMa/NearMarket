<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return ProductResource::collection(Product::paginate(10));
    }

    public function store(ProductRequest $request)
    {
        return new ProductResource(Product::makeOne($request->validated()));
    }

    public function show(Product $product)
    {
        return new ProductResource($product->load('shop', 'category'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product = $product->updateMe($request->validated());

        return new ProductResource($product->load('shop', 'category'));
    }

    public function destroy(Product $product)
    {
        return $product->delete();
    }
}
