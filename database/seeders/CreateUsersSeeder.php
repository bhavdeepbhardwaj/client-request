<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Models\User;


class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'info@ashplan.media',
               'is_admin'=>'1',
               'password'=> bcrypt('Ashplan@1234'),

            ],

            [

               'name'=>'User',
               'email'=>'contact@avita-india.com',
               'is_admin'=>'0',
               'password'=> bcrypt('Avita@1234'),

            ],

        ];

  

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}