<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderItemRequest;
use App\Http\Resources\OrderItemResource;
use App\OrderItem;

class OrderItemController extends Controller
{
    public function index()
    {
        return OrderItemResource::collection(OrderItem::all());
    }

    public function store(OrderItemRequest $request)
    {
        return new OrderItemResource(OrderItem::makeOne($request->validated()));
    }

    public function show(OrderItem $orderItem)
    {
        return new OrderItemResource($orderItem->load('order', 'product'));
    }

    public function update(OrderItemRequest $request, OrderItem $orderItem)
    {
        $orderItem = $orderItem->updateMe($request->validated());

        return new OrderItemResource($orderItem->load('order', 'product'));
    }

    public function destroy(OrderItem $orderItem)
    {
        return $orderItem->delete();
    }
}
