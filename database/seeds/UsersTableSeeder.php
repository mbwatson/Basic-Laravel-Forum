<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
		DB::table('users')->delete();

		$faker = Faker\Factory::create();
		
		$seeds = array(
			array(
				'id' => 1,
				'name' => 'mwatson',
				'slug' => 'mwatson',
				'first_name' => 'Matt',
				'last_name' => 'Watson',
				'location' => 'Raleigh, NC',
				'email' => 'email@ddress.com',
				'password' => Hash::make('password'),
				'admin' => true
			),
			array(
				'id' => 2,
				'name' => 'username',
				'slug' => 'username',
				'first_name' => $faker->firstName,
				'last_name' => $faker->lastName,
				'location' => $faker->city . ', ' . $faker->country,
				'email' => 'email@ddress.net',
				'password' => Hash::make('password'),
				'admin' => false
			)
		);

		DB::table('users')->insert($seeds);

		$users = factory(App\User::class, 8)->create();
   }
}
