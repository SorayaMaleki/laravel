<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        \App\Tag::truncate();

        $tags = factory(\App\Tag::class, 10)->create();

        $this->applyTagsToPosts($tags->pluck('id')->toArray());
    }

    private function applyTagsToPosts($tagIds)
    {
        DB::table('post_tags')->truncate();
        $postIds = \App\Models\Post::pluck('id')->toArray();
        foreach ($postIds as $postId){
            shuffle($tagIds);
            $tagIdsToInsert = array_slice($tagIds, 0, random_int(1, 4));
            foreach ($tagIdsToInsert as $tagId){
                DB::table('post_tags')->insert([
                    'post_id' => $postId,
                    'tag_id' => $tagId,
                ]);
            }
        }
    }
}
