<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class VeicleClassesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('veicle_classes')->delete();

        DB::table('veicle_classes')->insert(array (
            0 =>
            array (
                'id' => 3,
                'name' => 'Ligeiro',
                'created_at' => '2022-02-08 09:24:53',
                'updated_at' => '2022-02-11 09:36:23',
            ),
            1 =>
            array (
                'id' => 5,
                'name' => 'Pesado',
                'created_at' => '2022-02-10 19:27:48',
                'updated_at' => '2022-02-10 19:27:48',
            ),
            2 =>
            array (
                'id' => 6,
                'name' => 'Ligeiro Pesado',
                'created_at' => '2022-02-10 19:27:57',
                'updated_at' => '2022-02-10 19:27:57',
            ),
            3 =>
            array (
                'id' => 7,
                'name' => 'Moto',
                'created_at' => '2022-02-10 19:48:45',
                'updated_at' => '2022-02-10 19:48:45',
            ),
            4 =>
            array (
                'id' => 8,
                'name' => 'cargas pesadas',
                'created_at' => '2022-02-10 19:48:55',
                'updated_at' => '2022-02-10 19:48:55',
            ),
            5 =>
            array (
                'id' => 9,
                'name' => 'Profissional',
                'created_at' => '2022-02-10 19:49:06',
                'updated_at' => '2022-02-10 19:49:06',
            ),
        ));
    }
}
