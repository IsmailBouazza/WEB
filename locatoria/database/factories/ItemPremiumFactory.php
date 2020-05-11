<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ItemPremium;
use Faker\Generator as Faker;

$factory->define(ItemPremium::class, function (Faker $faker) {
    return [
        //
        'item_id'=>factory(App\Item::class),
        'status'=>$faker->randomNumber(3),
    ];
});
