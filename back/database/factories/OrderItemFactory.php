<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use App\OrderItem;
use App\Product;
use Faker\Generator as Faker;

$factory->define(OrderItem::class, function (Faker $faker) {
    return [
        'order_id' => factory(Order::class),
        'product_id' => factory(Product::class),
        'number' => $faker->randomNumber(),
    ];
});
