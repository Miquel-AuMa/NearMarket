<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public static function makeOne(array $data)
    {
        $orderItem = new OrderItem();
        $orderItem->order()->associate(Order::find($data['order_id']));
        $orderItem->product()->associate(Product::find($data['product_id']));
        $orderItem->number = $data['number'];

        $orderItem->save();

        $orderItem->load('order', 'product');

        return $orderItem;
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function updateMe(array $data)
    {
        if (isset($data['order_id'])) {
            $this->order()->associate(Order::find($data['order_id']));
        }

        if (isset($data['product_id'])) {
            $this->product()->associate(Product::find($data['product_id']));
        }

        $this->number = $data['number'] ?? $this->number;

        $this->save();

        $this->load('order', 'product');

        return $this;
    }
}
