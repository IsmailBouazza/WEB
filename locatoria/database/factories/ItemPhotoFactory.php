<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ItemPhoto;
use Faker\Generator as Faker;

$factory->define(ItemPhoto::class, function (Faker $faker) {
    return [
        'item_id'=>factory(App\Item::class),
        'photo_path'=>$faker->sentence,
    ];
});
