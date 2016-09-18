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
        
        factory(App\Post::class, 25)
            ->create()
            ->each(function($post) {
                foreach (range(1,rand(0,10)) as $index) {
                    $post->comments()->save(factory(App\Comment::class)->make());
                }
        });
    }
}
