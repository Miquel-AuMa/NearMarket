<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use App\User;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'delivery' => $faker->boolean,
        'state' => $faker->randomElement(["accepted", "declined", "received"]),
        'request_date' => $faker->dateTime,
        'pickup_date' => $faker->dateTime,
        'annotations' => $faker->word,
    ];
});
