<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Super_Admin',
                'created_at' => '2021-03-20 13:57:45',
                'updated_at' => '2021-03-20 13:57:45',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Manager',
                'created_at' => '2021-03-20 14:09:45',
                'updated_at' => '2021-03-20 14:09:45',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Employe',
                'created_at' => '2021-03-20 14:12:42',
                'updated_at' => '2021-03-20 14:12:49',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}