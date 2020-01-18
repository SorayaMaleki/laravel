<?php

use Illuminate\Database\Seeder;
use App\Profile;
use App\User;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::truncate();
        $userIds = User::pluck('id')->toArray();

        foreach ($userIds as $userId){
            factory(Profile::class, 1)->create([
                'user_id' => $userId
            ]);
        }
    }
}
