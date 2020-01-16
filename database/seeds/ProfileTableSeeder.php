<?php

use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Profile::truncate();
        $userIds = \App\User::pluck('id')->toArray();

        foreach ($userIds as $userId){
            factory(\App\Profile::class, 1)->create([
                'user_id' => $userId
            ]);
        }
    }
}
