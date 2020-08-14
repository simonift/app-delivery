<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurants;
use Faker\Generator as Faker;


$factory->define(Restaurants::class, function (Faker $faker) {
    return [
        'name' =>$faker->word(5),
        'first_comment' =>$faker->sentence(10),
        'second_comment' =>$faker->sentence(10),
        'slogan' =>$faker->text(20),
        'contact' =>$faker->numberBetween(9000,9999),
        'phone' =>$faker->numberBetween(9000,9999)
    ];
});
