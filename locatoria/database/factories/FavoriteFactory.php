<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Favorite;
use Faker\Generator as Faker;

$factory->define(Favorite::class, function (Faker $faker) {
    return [
        //
        'user_id'=>factory(App\User::class),
        'item_id'=>factory(App\Item::class),
    ];
});
