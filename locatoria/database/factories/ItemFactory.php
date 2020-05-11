<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        //
        'user_id'=>factory(App\User::class),
        'category_id'=>factory(App\Category::class),
        'title' => $faker->name,
        'description'=>$faker->sentence,
        'thumbnail_path'=>$faker->sentence,
        'status'=>$faker->sentence,
        'price'=>$faker->randomFloat(2,0,300),
        'dispo_starts'=>$faker->dateTime,
        'dispo_ends'=>$faker->dateTime,
    ];
});
