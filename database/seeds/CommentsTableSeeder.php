<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\User;
use App\Post;
class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::truncate();
        $userIds=User::pluck('id')->toArray();
        $posts=Post::pluck('id')->toArray();
        for ($i=0;$i<10;$i++){
            factory(Comment::class,1)->create([
                'post_id'=>array_random($posts),
                'user_id'=>array_random($userIds),
            ]);
        }
    }
}
