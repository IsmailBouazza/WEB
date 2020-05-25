<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        //
        'user_id'=>factory(App\User::class),
        'commentable_id'=>factory(App\User::class),
        'commentable_type'=>App\User::class,
        'comment'=>$faker->sentence,
        'rating'=>$faker->numberBetween(0,5)
    ];

//    return [
//        //
//        'user_id'=>factory(App\User::class),
//        'commentable_id'=>factory(App\Item::class),
//        'commentable_type'=>App\Item::class,
//        'comment'=>$faker->sentence,
//        'rating'=>$faker->numberBetween(0,5)
//    ];

});
