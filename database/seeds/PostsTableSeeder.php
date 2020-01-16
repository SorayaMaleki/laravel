<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Post::truncate();

        $userIds = \App\User::pluck('id')->toArray();

        for ($i=1; $i<=15; $i++){
            factory(\App\Post::class)->create([
                'user_id' => array_random($userIds)
            ]);
        }
    }
}
