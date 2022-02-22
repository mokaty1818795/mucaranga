<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_types')->delete();

        DB::table('document_types')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Bilhete de Identidade',
                'created_at' => '2022-02-10 11:37:17.000000',
                'updated_at' => '2022-02-10 11:37:17.000000',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Cédula de nascimento',
                'created_at' => '2022-02-10 18:00:31.000000',
                'updated_at' => '2022-02-10 18:00:31.000000',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Assento de nascimento ',
                'created_at' => '2022-02-10 18:00:40.000000',
                'updated_at' => '2022-02-10 18:00:40.000000',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Passaport',
                'created_at' => '2022-02-10 18:00:52.000000',
                'updated_at' => '2022-02-10 18:00:52.000000',
            ),
            3 =>
            array (
                'id' => 5,
                'name' => 'DIR',
                'created_at' => '2022-02-10 18:00:52.000000',
                'updated_at' => '2022-02-10 18:00:52.000000',
            ),
        ));

    }
}
