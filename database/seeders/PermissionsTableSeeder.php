<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Role_Access',
                'created_at' => '2021-03-20 13:46:16',
                'updated_at' => '2021-03-20 13:46:16',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Role_Created',
                'created_at' => '2021-03-20 13:46:24',
                'updated_at' => '2021-03-20 13:46:24',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Role_Updated',
                'created_at' => '2021-03-20 13:46:31',
                'updated_at' => '2021-03-20 13:48:06',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Role_Deleted',
                'created_at' => '2021-03-20 13:46:40',
                'updated_at' => '2021-03-20 13:48:11',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Permission_Access',
                'created_at' => '2021-03-20 13:48:45',
                'updated_at' => '2021-03-20 13:48:45',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Permission_Created',
                'created_at' => '2021-03-20 13:48:52',
                'updated_at' => '2021-03-20 13:48:52',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Permission_Updated',
                'created_at' => '2021-03-20 13:49:01',
                'updated_at' => '2021-03-20 13:49:01',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Permission_Deleted',
                'created_at' => '2021-03-20 13:49:11',
                'updated_at' => '2021-03-20 13:49:11',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'User_Access',
                'created_at' => '2021-03-20 13:50:00',
                'updated_at' => '2021-03-20 13:50:00',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'title' => 'User_Created',
                'created_at' => '2021-03-20 13:50:08',
                'updated_at' => '2021-03-20 13:50:08',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'User_Updated',
                'created_at' => '2021-03-20 13:50:18',
                'updated_at' => '2021-03-20 13:50:18',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'User_Deleted',
                'created_at' => '2021-03-20 13:50:42',
                'updated_at' => '2021-03-20 13:50:42',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'title' => 'Task_Access',
                'created_at' => '2021-03-20 13:53:32',
                'updated_at' => '2021-03-20 13:53:32',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'title' => 'Task_Created',
                'created_at' => '2021-03-20 13:53:38',
                'updated_at' => '2021-03-20 13:53:38',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'title' => 'Task_Updated',
                'created_at' => '2021-03-20 13:53:46',
                'updated_at' => '2021-03-20 13:53:46',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'title' => 'Task_Deleted',
                'created_at' => '2021-03-20 13:53:53',
                'updated_at' => '2021-03-20 13:53:53',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'title' => 'Project_Access',
                'created_at' => '2021-03-20 13:56:14',
                'updated_at' => '2021-03-20 13:56:14',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'title' => 'Project_Created',
                'created_at' => '2021-03-20 13:56:24',
                'updated_at' => '2021-03-20 13:56:24',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'title' => 'Project_Updated',
                'created_at' => '2021-03-20 13:56:34',
                'updated_at' => '2021-03-20 13:56:34',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'title' => 'Project_Deleted',
                'created_at' => '2021-03-20 13:56:43',
                'updated_at' => '2021-03-20 13:56:43',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'title' => 'Project_Completed',
                'created_at' => '2021-03-20 21:02:24',
                'updated_at' => '2021-03-20 21:02:33',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'title' => 'Task_Completed',
                'created_at' => '2021-03-20 21:02:37',
                'updated_at' => '2021-03-20 21:02:37',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}