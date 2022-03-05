<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->delete();

        DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Administrador',
                'email' => 'administrator@ecm.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$53OiB6zTiypKiAfYUBO1yeIkXkJcOr/xDZ7.OzkYq110mewXGDYKi',
                'remember_token' => NULL,
                'created_at' => '2022-02-07 20:53:19',
                'updated_at' => '2022-03-03 21:01:16',
                'contact' => '857607095',
                'active' => 1,
                'genre' => 1,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Alexander',
                'email' => 'director@ecm.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$BEofroj7IdlIUhPTJJ.A0e.g3YwpcRoFfUrt8m5SbKRcmVDcHaeJm',
                'remember_token' => NULL,
                'created_at' => '2022-02-08 11:14:34',
                'updated_at' => '2022-03-03 21:01:52',
                'contact' => '845023119',
                'active' => 1,
                'genre' => 1,
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Nelson Alexandre Mutane',
                'email' => 'instrutor@ecm.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$6f1tdI3HZvTpuOA2Oxo.ounZiGDD8N6LZpQPtfsWmF2zEZjo0vp9C',
                'remember_token' => NULL,
                'created_at' => '2022-03-04 20:50:43',
                'updated_at' => '2022-03-04 20:50:43',
                'contact' => '857607095',
                'active' => 0,
                'genre' => 1,
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Employee',
                'email' => 'employee@ecm.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ihK5vnB.2hJYO.cDm4QUmO9twACmk/5/hg..tSSVWg5m/tbbfoHaO',
                'remember_token' => NULL,
                'created_at' => '2022-03-05 12:25:29',
                'updated_at' => '2022-03-05 12:25:29',
                'contact' => '857607095',
                'active' => 0,
                'genre' => 1,
            ),
        ));


    }
}
