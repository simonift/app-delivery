<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word(3),
        'description' => $faker->sentence(10),
        'long_description' => $faker->text,
        'price' => $faker->numberBetween(990,19990),

        'category_id' => $faker->numberBetween(1,5)
    ];
});
