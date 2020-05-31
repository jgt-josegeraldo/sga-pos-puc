<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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

$factory->define(App\Model\Asset\ModelEloquent\Asset::class, function (Faker $faker) {
    return [
        'code' => $faker->numberBetween(1000000, 999999999),
        'name' => $faker->text(45),
        'description' => $faker->text(250),
        'category_id' => $faker->numberBetween(1, 2),
        'asset_status_id' => $faker->numberBetween(1, 2),
        'acquisition_date' => $faker->dateTimeBetween('-3 years'),
    ];
});

$factory->define(App\Model\Asset\ModelEloquent\Mantenance::class, function (Faker $faker) {
    return [
        'note' => $faker->text(250),
        'maintenance_status_id' => $faker->numberBetween(1, 3),
        'responsible_id' => $faker->numberBetween(1, 2),
        'asset_id' => $faker->numberBetween(1, 100),
    ];
});
