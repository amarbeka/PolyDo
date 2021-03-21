<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Super Admin',
                'email' => 'admin@demo.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$S0DVCLpR4waJaQMDSnz3lOjlUv2Er37B5KKPm3UrNlisbHfHeNbia',
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 13:45:12',
                'updated_at' => '2021-03-20 13:45:12',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Manager',
                'email' => 'manager@demo.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$8zTQH/I0DsaHX6JgDbjIAu5OyAHCXGiZGZfZ1qYMqdv.AHwatEgMK',
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 14:13:28',
                'updated_at' => '2021-03-20 14:13:28',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Empolye',
                'email' => 'empolye@demo.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$mUsCuyGcdNOduk0P.EQAj.a0DT6V6I8WDrh8sAlUrAHYvcHBiHkom',
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 14:14:12',
                'updated_at' => '2021-03-20 14:14:12',
            ),
        ));
        
        
    }
}