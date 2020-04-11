<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Laravel\Passport\PersonalAccessClient;

$factory->define(PersonalAccessClient::class, function (Faker $faker) {
    return [
        'client_id' => factory(\Laravel\Passport\Client::class),
    ];
});
