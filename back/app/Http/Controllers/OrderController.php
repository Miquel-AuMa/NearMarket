<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        return OrderResource::collection(Order::all());
    }

    public function order(OrderRequest $request)
    {
        return new OrderResource(Order::makeOne($request->validated()));
    }

    public function show(Order $order)
    {
        return new OrderResource($order->load('user'));
    }

    public function update(OrderRequest $request, Order $order)
    {
        $order = $order->updateMe($request->validated());

        return new OrderResource($order->load('user'));
    }

    public function destroy(Order $order)
    {
        return $order->delete();
    }
}
