<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Resources\StoreResource;
use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        return StoreResource::collection(Store::all());
    }

    public function store(StoreRequest $request)
    {
        return new StoreResource(Store::makeOne($request->validated()));
    }

    public function show(Store $store)
    {
        return new StoreResource($store->load('storeType'));
    }

    public function update(StoreRequest $request, Store $store)
    {
        $store = $store->updateMe($request->validated());

        return new StoreResource($store->load('storeType'));
    }

    public function destroy(Store $store)
    {
        return $store->delete();
    }
}
