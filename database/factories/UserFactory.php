<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => "Spencer Hill",
        'email' => "operations@theportlandcompany.com",
        'email_verified_at' => now(),
        'password' => bcrypt('C9mvzdcwhmk!'), // C9mvzdcwhmk!
        'remember_token' => Str::random(10),
        'is_admin' => 1
    ];
});

$factory->define(App\SiteMap::class, function (Faker $faker) {
    return [
        'homepage_included' => 1,
        'homepage_freq' => 'weekly',
        'homepage_priority' => '1.0',

        'posts_included' => 1,
        'posts_freq' => 'weekly',
        'posts_priority' => '0.9',

        'cats_included' => 1,
        'cats_freq' => 'weekly',
        'cats_priority' => '0.9',

        'tags_included' => 1,
        'tags_freq' => 'weekly',
        'tags_priority' => '0.8',

        'authors_included' => 0,
        'authors_freq' => 'weekly',
        'authors_priority' => '0.7'
    ];
});


