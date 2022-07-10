<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    $this->faker->locale('en_US');
    $email = $this->faker->unique()->email;
    return [
        "FirstName" => $this->faker->name(),
        "LastName" => $this->faker->lastName(),
        "email" => $email,
        "password" => \Illuminate\Support\Facades\Hash::make("password"),
        "CountryCode" => $this->faker->countryCode(),
        "CurrentBadge" => 1
    ];
});
