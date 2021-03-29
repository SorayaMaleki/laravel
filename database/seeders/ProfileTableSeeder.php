<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\User;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Profile::truncate();
        $userIds = User::pluck('id')->toArray();
        foreach ($userIds as $userId){
            factory(App\Models\Profile::class)->create([
                'user_id' =>$userId,
            ]);
        }
    }
}
