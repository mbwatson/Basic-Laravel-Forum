<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   		DB::table('comments')->delete();

   		$faker = Faker\Factory::create();
   		
        $users = App\User::all()->pluck('id')->toArray();
        $posts = App\Post::all()->pluck('id')->toArray();

        foreach(range(1,200) as $index){
            $post = App\Comment::create([
                'body' => $faker->realText(500),
                'user_id' => $faker->randomElement($users),
                'post_id' => $faker->randomElement($posts),
                'created_at' => $faker->dateTimeBetween($startDate = '-5 days', $endDate = 'now')
            ]);
        }
    }
}
