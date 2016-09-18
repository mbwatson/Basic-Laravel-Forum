<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker)
{
    static $password;

    return [
        'name' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('password'),
        'remember_token' => str_random(10),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'location' => $faker->city . ', ' . $faker->country,
        'password' => Hash::make('password'),
        'admin' => false,
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker)
{
    $users = App\User::all()->pluck('id')->toArray();
    $channels = App\Channel::all()->pluck('id')->toArray();
    
    return [
        'title' => rtrim($faker->unique()->realText(32),'.'),
        'body' => $faker->realText(2500),
        'user_id' => $faker->randomElement($users),
        'channel_id' => $faker->randomElement($channels),
        'created_at' => $faker->dateTimeBetween($startDate = '-10 days', $endDate = '-5 days'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-5 days', $endDate = 'now')
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker)
{
    $users = App\User::all()->pluck('id')->toArray();
    return [
        'body' => $faker->realText(500),
        'user_id' => $faker->randomElement($users),
        'created_at' => $faker->dateTimeBetween($startDate = '-5 days', $endDate = 'now'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-2 days', $endDate = 'now')
    ];
});

$factory->define(App\Channel::class, function (Faker\Generator $faker)
{
    return [
        'title' => rtrim($faker->unique()->realText(15),'.'),
        'description' => $faker->paragraph(5),
        'color' => $faker->hexcolor(),
    ];
});
