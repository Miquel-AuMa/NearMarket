<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Store;
use App\StoreType;
use Faker\Generator as Faker;

$factory->define(Store::class, function (Faker $faker) {
    return [
        'store_type_id' => factory(StoreType::class),
        'phone_number' => $faker->unique()->phoneNumber,
        'name' => $faker->word,
        'password' => bcrypt('secret'),
        'address_line_1' => $faker->address,
        'city' => $faker->city,
        'zip' => $faker->postcode,
        'photo' => null,
    ];
});
