<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shop;
use App\Category;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => factory(Category::class),
	    'shop_id' => factory(Shop::class),
        'name' => $faker->sentence,
	    'description' => $faker->sentence,        
        'unity_price' => $faker->randomFloat(),
        'available' => $faker->boolean,
        'photo' => null,
    ];
});
