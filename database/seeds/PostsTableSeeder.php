<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   		DB::table('posts')->delete();

   		$faker = Faker\Factory::create();
   		
        $users = App\User::all()->pluck('id')->toArray();
        $channels = App\Channel::all()->pluck('id')->toArray();

        foreach(range(1,100) as $index){
            $post = App\Post::create([
                'title' => $faker->realText(25),
                'body' => $faker->realText(2500),
                'user_id' => $faker->randomElement($users),
                'channel_id' => $faker->randomElement($channels),
                'created_at' => $faker->dateTimeBetween($startDate = '-10 days', $endDate = '-5 days'),
                'updated_at' => $faker->dateTimeBetween($startDate = '-5 days', $endDate = 'now')
            ]);
        }
        
    }
}
