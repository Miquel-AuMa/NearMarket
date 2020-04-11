<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shop;
use App\ShopType;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {
    return [
        'shop_type_id' => factory(ShopType::class),
        'phone_number' => $faker->unique()->phoneNumber,
        'name' => $faker->word,
        'password' => bcrypt('secret'),
        'address_line_1' => $faker->address,
        'city' => $faker->city,
        'zip' => $faker->postcode,
        'photo' => null,
    ];
});
