<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DeliveryMan;
use Faker\Generator as Faker;

$factory->define(DeliveryMan::class, function (Faker $faker) {
    return [
        'rut' =>$faker->numberBetween(18000000,18999999),
        'name' =>$faker->word(5),
        'description' =>$faker->sentence(10),
        'phone' =>$faker->numberBetween(9000,9999)

    ];
});
