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
   		
        foreach(range(1,6) as $index){
            $post = App\Channel::create([
				'title' => $faker->unique()->word,
                'description' => $faker->realText(100),
                'color' => $faker->hexcolor(),
			    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}