<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   		DB::table('channels')->delete();

   		$faker = Faker\Factory::create();
   		
        factory(App\Channel::class, 10)->create();
    }
}