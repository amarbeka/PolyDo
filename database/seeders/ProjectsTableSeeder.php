<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('projects')->delete();
        
        \DB::table('projects')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Quis irure quo duis',
                'description' => 'Minim temporibus pla',
                'start_at' => '2021-11-19',
                'end_at' => '1995-02-07',
                'finish_at' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:06:04',
                'updated_at' => '2021-03-20 21:06:04',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Aut similique harum',
                'description' => 'Ducimus quo incidid',
                'start_at' => '2001-02-24',
                'end_at' => '2004-05-02',
                'finish_at' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:06:09',
                'updated_at' => '2021-03-20 21:06:09',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Qui voluptates simil',
                'description' => 'Sint quaerat adipisc',
                'start_at' => '2011-09-15',
                'end_at' => '1993-09-07',
                'finish_at' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:06:13',
                'updated_at' => '2021-03-20 21:06:13',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Vitae aut laboris om',
                'description' => 'Laudantium sed atqu',
                'start_at' => '2000-11-18',
                'end_at' => '2017-11-10',
                'finish_at' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:06:18',
                'updated_at' => '2021-03-20 21:06:18',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Cupidatat quas est q',
                'description' => 'Veniam culpa id mi',
                'start_at' => '1995-09-02',
                'end_at' => '2003-10-24',
                'finish_at' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:06:23',
                'updated_at' => '2021-03-20 21:06:23',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Eveniet quo in ad i',
                'description' => 'Voluptatem officia c',
                'start_at' => '1990-04-16',
                'end_at' => '2011-10-08',
                'finish_at' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:06:27',
                'updated_at' => '2021-03-20 21:06:27',
            ),
        ));
        
        
    }
}