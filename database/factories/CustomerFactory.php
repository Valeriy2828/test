<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

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
$factory->define(App\Models\Customer::class, function (Faker $faker) {
    $name = $faker->name;
		
	$data = [
		'first_name' => $name,
        'last_name' => $name,
        'firm_id' => rand(1,10001)
	];
	
	return $data;
});

