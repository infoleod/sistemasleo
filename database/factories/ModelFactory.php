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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Image::class, function (Faker\Generator $faker) {
  return [
    'description' => $faker->name
  ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name'            => $faker->firstName,
        'surname'         => $faker->lastName,
        'email'           => $faker->unique()->safeEmail,
        'phone'           => $faker->e164PhoneNumber,
        'password'        => $password ?: $password = bcrypt('secret'),
        'remember_token'  => str_random(10),
        'image_id'        => '1',
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name'            => $name = $faker->name,
        'slug'            => str_slug($name)
    ];
});

// Creamos un model factory para los Productos
$factory->define(App\Product::class, function (Faker\Generator $faker) {
    // Guardamos el faker del nombre asi lo usamos luego dentro de la funcion
    $title = $faker->name;
    // Devolvemos el faker de los datos
    return [
        'title'           => $title,
        'slug'            => str_slug($title),
        'description'     => implode(' ', $faker->paragraphs(5)),
        'price'           => rand(100,2000),
        'quant_sold'      => rand(1,20)
    ];
});
