<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'name' => 'Root administrator',
                'email' => 'administrator@ecm.com',
                'email_verified_at' => NULL,
                'password' => Hash::make('admin@admin'),
                'remember_token' => NULL,
                'created_at' => '2022-02-07 20:53:19',
                'updated_at' => '2022-02-09 16:41:06',
                'contact' => '',
                'active' => 1,
                'genre' => 1,
                'userscol' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Director administrator',
                'email' => 'director@ecm.com',
                'email_verified_at' => NULL,
                'password' => Hash::make('director@director'),
                'remember_token' => NULL,
                'created_at' => '2022-02-08 11:14:34',
                'updated_at' => '2022-02-08 11:22:38',
                'contact' => '',
                'active' => 1,
                'genre' => 1,
                'userscol' => NULL,
            ),
        ));


    }
}
