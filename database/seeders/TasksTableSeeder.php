<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tasks')->delete();
        
        \DB::table('tasks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Odit eveniet ipsam',
                'description' => 'Maxime officia eos',
                'start_at' => '1972-03-17',
                'end_at' => '1992-03-08',
                'finish_at' => NULL,
                'project_id' => 2,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:06:45',
                'updated_at' => '2021-03-20 21:06:45',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Tempore id fuga Id',
                'description' => 'Sit laborum ratione',
                'start_at' => '1986-04-12',
                'end_at' => '1970-06-14',
                'finish_at' => NULL,
                'project_id' => 4,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:06:50',
                'updated_at' => '2021-03-20 21:06:50',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Provident anim ut n',
                'description' => 'Rerum recusandae Eu',
                'start_at' => '1985-03-06',
                'end_at' => '1982-11-01',
                'finish_at' => NULL,
                'project_id' => 6,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:06:56',
                'updated_at' => '2021-03-20 21:06:56',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Aperiam tempora dolo',
                'description' => 'Eiusmod iusto incidu',
                'start_at' => '1989-04-22',
                'end_at' => '1989-12-18',
                'finish_at' => NULL,
                'project_id' => 4,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:07:01',
                'updated_at' => '2021-03-20 21:07:01',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Veniam vero a at mo',
                'description' => 'Sequi reprehenderit',
                'start_at' => '2003-11-22',
                'end_at' => '1972-11-22',
                'finish_at' => NULL,
                'project_id' => 6,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:07:05',
                'updated_at' => '2021-03-20 21:07:05',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Voluptate aut et nul',
                'description' => 'Laborum Quae accusa',
                'start_at' => '1986-08-03',
                'end_at' => '1972-07-27',
                'finish_at' => NULL,
                'project_id' => 6,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:07:08',
                'updated_at' => '2021-03-20 21:07:08',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Proident odio recus',
                'description' => 'Atque dolor omnis au',
                'start_at' => '1997-05-01',
                'end_at' => '1970-05-19',
                'finish_at' => NULL,
                'project_id' => 1,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:07:12',
                'updated_at' => '2021-03-20 21:07:12',
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Deserunt ipsam offic',
                'description' => 'Et et impedit est l',
                'start_at' => '2019-06-07',
                'end_at' => '1994-03-01',
                'finish_at' => NULL,
                'project_id' => 2,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:07:19',
                'updated_at' => '2021-03-20 21:07:19',
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'In doloremque obcaec',
                'description' => 'Sapiente autem eiusm',
                'start_at' => '1992-04-20',
                'end_at' => '2006-09-06',
                'finish_at' => NULL,
                'project_id' => 2,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:07:23',
                'updated_at' => '2021-03-20 21:07:23',
            ),
            9 => 
            array (
                'id' => 10,
                'title' => 'Voluptatem Asperior',
                'description' => 'Voluptatum velit et',
                'start_at' => '2001-11-03',
                'end_at' => '2012-01-11',
                'finish_at' => NULL,
                'project_id' => 5,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:07:28',
                'updated_at' => '2021-03-20 21:07:28',
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'Nihil in quo debitis',
                'description' => 'Mollit molestias aut',
                'start_at' => '1983-09-24',
                'end_at' => '2021-02-15',
                'finish_at' => NULL,
                'project_id' => 5,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:07:34',
                'updated_at' => '2021-03-20 21:07:34',
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'Ipsam ut qui sit aut',
                'description' => 'Dolores id sapiente',
                'start_at' => '2001-08-20',
                'end_at' => '1972-12-28',
                'finish_at' => NULL,
                'project_id' => 4,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:07:38',
                'updated_at' => '2021-03-20 21:07:38',
            ),
            12 => 
            array (
                'id' => 13,
                'title' => 'Aut dolores mollitia',
                'description' => 'Id quia magni sapien',
                'start_at' => '2018-08-10',
                'end_at' => '2015-02-21',
                'finish_at' => NULL,
                'project_id' => 2,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:07:44',
                'updated_at' => '2021-03-20 21:07:44',
            ),
            13 => 
            array (
                'id' => 14,
                'title' => 'Reprehenderit exerci',
                'description' => 'Iusto suscipit dolor',
                'start_at' => '1972-01-19',
                'end_at' => '1999-04-03',
                'finish_at' => NULL,
                'project_id' => 3,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:07:48',
                'updated_at' => '2021-03-20 21:07:48',
            ),
            14 => 
            array (
                'id' => 15,
                'title' => 'Minima in delectus',
                'description' => 'Mollitia odio consec',
                'start_at' => '1997-10-24',
                'end_at' => '1978-07-02',
                'finish_at' => NULL,
                'project_id' => 4,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:07:52',
                'updated_at' => '2021-03-20 21:07:52',
            ),
            15 => 
            array (
                'id' => 16,
                'title' => 'Minim fuga Suscipit',
                'description' => 'Expedita aut quo eni',
                'start_at' => '2008-09-11',
                'end_at' => '1989-08-11',
                'finish_at' => NULL,
                'project_id' => 5,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:07:56',
                'updated_at' => '2021-03-20 21:07:56',
            ),
            16 => 
            array (
                'id' => 17,
                'title' => 'Dolorum fugit aut v',
                'description' => 'Voluptate quia totam',
                'start_at' => '1978-03-28',
                'end_at' => '1972-11-05',
                'finish_at' => NULL,
                'project_id' => 3,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:08:01',
                'updated_at' => '2021-03-20 21:08:01',
            ),
            17 => 
            array (
                'id' => 18,
                'title' => 'Adipisicing deserunt',
                'description' => 'Repellendus Natus q',
                'start_at' => '2003-06-20',
                'end_at' => '1986-03-21',
                'finish_at' => NULL,
                'project_id' => 6,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:08:06',
                'updated_at' => '2021-03-20 21:08:06',
            ),
            18 => 
            array (
                'id' => 19,
                'title' => 'Molestiae possimus',
                'description' => 'Qui quas molestias s',
                'start_at' => '2017-06-01',
                'end_at' => '1981-05-28',
                'finish_at' => NULL,
                'project_id' => 3,
                'user_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-03-20 21:08:12',
                'updated_at' => '2021-03-20 21:08:12',
            ),
        ));
        
        
    }
}