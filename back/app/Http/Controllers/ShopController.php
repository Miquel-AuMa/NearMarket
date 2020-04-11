<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopRequest;
use App\Http\Resources\ShopResource;
use App\Shop;

class ShopController extends Controller
{
    public function index()
    {
        return ShopResource::collection(Shop::paginate(10)->load('shopType'));
    }

    public function store(ShopRequest $request)
    {
        return new ShopResource(Shop::makeOne($request->validated()));
    }

    public function show(Shop $shop)
    {
        return new ShopResource($shop->load('shopType'));
    }

    public function update(ShopRequest $request, Shop $shop)
    {
        $shop = $shop->updateMe($request->validated());

        return new ShopResource($shop->load('shopType'));
    }

    public function destroy(Shop $shop)
    {
        return $shop->delete();
    }
}
