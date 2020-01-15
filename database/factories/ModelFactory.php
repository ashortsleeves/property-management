<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Property;
use App\State;
use App\Town;
use App\Photo;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Town::class, function(Faker $faker){
  return [
    'id'       => $faker->unique()->numberBetween(1, 1000),
    'name'     => $faker->firstName(),
    'state_id' => $faker->numberBetween(1, 6),
  ];
});

$factory->define(Property::class, function (Faker $faker) {
    $streets = $faker->randomElement([
      'Maple',
      'Oak',
      'Timber',
      'Pine',
      'Bridge',
      'Lake',
      'Pond',
      'Griff',
      'Carrot'
    ]);

    $address = $faker->numberBetween(1, 20)." ".$streets." ".$faker->randomElement([
      'St.',
      'Rd.',
      'Boulevard',
      'Drive'
    ]).$faker->randomElement([
      '',
      ', Apt '.$faker->numberBetween(1, 8)
    ]);
    $addressSlug = preg_replace('/\s*/', '-', $address);

    return [
        'address' => $address,
        'rent' => $faker->numberBetween(500, 1300),
        'bedrooms' => $faker->numberBetween(1, 5),
        'bathrooms' => $faker->numberBetween(1,3),
        'pets' => $faker->randomElement([
          'dogs negotiable',
          'cats negotiable',
          'pets negotiable',
          'not allowed'
        ]),
        'washer_dryer' => $faker->randomElement([
          'coin-op',
          'hook-ups',
          'machines in unit',
          'none'
        ]),
        'slug' => strtolower($addressSlug),
    ];
});


$factory->define(Photo::class, function (Faker $faker){
  return [
    'file' => $faker->randomElement([
      'placeholder-0.jpg',
      'placeholder-1.jpg',
      'placeholder-2.jpg',
      'placeholder-3.jpg',
      'placeholder-4.jpg',
      'placeholder-5.jpg',
      'placeholder-6.jpg',
      'placeholder-7.jpg',
      'placeholder-8.jpg',
      'placeholder-9.jpg',
    ]),
    'featured' => 1,
  ];
});
