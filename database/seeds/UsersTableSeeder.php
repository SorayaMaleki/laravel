<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //truncate users table
        \App\User::truncate();

        //create 3 user
        factory(\App\User::class, 3)->create();


//        return;
//        foreach ($this->data() as $item){
//            \App\User::create($item);
//        }
    }

//    private function data()
//    {
//        return [
//            ['name' => 'sayad aazami', 'email' => 'sayadaazami@gmail.com', 'password' => bcrypt('132456')],
//            ['name' => 'mohamad niko', 'email' => 'mniko@gmail.com', 'password' => bcrypt('132456')],
//            ['name' => 'meysam hashemi', 'email' => 'meysamhashemi@gmail.com', 'password' => bcrypt('132456')],
//        ];
//    }


}
