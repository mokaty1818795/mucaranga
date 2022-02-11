<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CivilStatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('civil_states')->delete();

        DB::table('civil_states')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Solteiro',
                'created_at' => '2022-02-10 11:37:17.000000',
                'updated_at' => '2022-02-10 11:37:17.000000',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Casado',
                'created_at' => '2022-02-10 18:00:31.000000',
                'updated_at' => '2022-02-10 18:00:31.000000',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Divorciado',
                'created_at' => '2022-02-10 18:00:40.000000',
                'updated_at' => '2022-02-10 18:00:40.000000',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Outro',
                'created_at' => '2022-02-10 18:00:52.000000',
                'updated_at' => '2022-02-10 18:00:52.000000',
            ),
        ));


    }
}
