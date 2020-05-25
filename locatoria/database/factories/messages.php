<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    do {
        $from = rand(1, 10);
        $to = rand(1, 10);
        $is_read = rand(0, 1);
    } while ($from === $to);

    return [
        'from' => $from,
        'to' => $to,
        'message' => $faker->sentence,
        'is_read' => $is_read
    ];
});
