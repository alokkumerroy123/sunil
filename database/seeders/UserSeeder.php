<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name'=>'Admin',
           'phone'=>'01781',
           'address'=>'Dhaka',
           'email'=>'admin@gmail.com',
           'password'=>Hash::make('123'), 
           'role'=>'admin',

        ]);

            User::create([
           'name'=>'Alok',
           'phone'=>'01781090',
           'address'=>'Lalmonirhat',
           'email'=>'alok@gmail.com',
           'password'=>Hash::make('1234'), 
       

        ]);
    }
}
