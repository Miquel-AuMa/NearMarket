<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopTypeRequest;
use App\Http\Resources\ShopTypeResource;
use App\ShopType;

class ShopTypeController extends Controller
{
    public function index()
    {
        return ShopTypeResource::collection(ShopType::paginate(10)->load('shops'));
    }

    public function store(ShopTypeRequest $request)
    {
        return new ShopTypeResource(ShopType::makeOne($request->validated()));
    }

    public function show(ShopType $shopType)
    {
        return new ShopTypeResource($shopType->load('shops'));
    }

    public function update(ShopTypeRequest $request, ShopType $shopType)
    {
        $shopType = $shopType->updateMe($request->validated());

        return new ShopTypeResource($shopType->load('shops'));
    }

    public function destroy(ShopType $shopType)
    {
        return $shopType->delete();
    }
}
