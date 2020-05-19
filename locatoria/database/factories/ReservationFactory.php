<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reservation;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) {
    return [

        'user_id'=>factory(App\User::class),
        'user_owner_id'=>factory(App\User::class),
        'item_id'=>factory(App\Item::class),
        'status'=>0,
        'total_price'=>$faker->randomFloat(2,0,300),
        'date_start'=>$faker->dateTime,
        'date_end'=>$faker->dateTime,
        'user_read'=>0,
        'user_owner_read'=>0
    ];
});
