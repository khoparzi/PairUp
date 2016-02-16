<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 10; $i++) {
        	$people = [$faker->userName, $faker->firstName, $faker->lastName];
        	$country = DB::table('countries')->where('name', 'like', '%'.$faker->country.'%')->first();
        	$id = DB::table('users')->insertGetId([
        		'username' => $people[0],
        		'email' => $faker->email,
        		'password' => bcrypt('secret'),
        		'created_at' => Carbon\Carbon::now(),
        		'updated_at' => Carbon\Carbon::now()
        	]);
        	DB::table('profiles')->insert([
        		'user_id' => $id,
        		'first_name' => $people[1],
        		'last_name' => $people[2],
        		'bio' => $faker->paragraphs(3, true),
        		'url' => $faker->url,
        		'country_id' => $country->id,
        		'created_at' => Carbon\Carbon::now(),
        		'updated_at' => Carbon\Carbon::now()
        	]);
        }
    }
}
