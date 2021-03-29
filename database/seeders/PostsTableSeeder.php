<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Post::truncate();

        $userIds = \App\Models\User::pluck('id')->toArray();

        for ($i=1; $i<=15; $i++){
            factory(\App\Models\Post::class)->create([
                'user_id' => array_random($userIds)
            ]);
        }
    }
}
