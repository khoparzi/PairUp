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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->username,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

// Model factory for Profile
$factory->define(App\Models\Profile::class, function (Faker\Generator $faker) {
	// Loop through countries generated by Faker till we get one that's in the DB
	do {
		$country = DB::table('countries')->where('name', 'like', '%'.$faker->country.'%')->first();
	} while (!$country);

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'bio' => $faker->paragraphs(3, true),
        'url' => $faker->url,
        'town'=> $faker->city,
        'country_id' => $country->id,
    ];
});

// Extended Model factory for Profile that also makes a user
$factory->defineAs(App\Models\Profile::class, 'withAUser', function (Faker\Generator $faker) use ($factory) {
	$profile = $factory->raw(App\Models\Profile::class);
	$user = factory(App\Models\User::class)->create()->id;
    return array_merge($profile, ['user_id' => $user]);
});

$factory->define(App\Models\Tag::class, function (Faker\Generator $faker) {
    $name = $faker->word;
    return [
        'name' => $name,
        'slug' => $name
    ];
});
