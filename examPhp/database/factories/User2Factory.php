<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\User2::class, function (Faker $faker) {
    return [
        'username' => $faker->name,
        'email' =>$faker->unique()->safeEmail(),
        'password' => Str::random(10),
        'birthday' => '2021-08-17'
    ];
});
