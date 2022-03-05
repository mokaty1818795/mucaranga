<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PaymentPhasesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('payment_phases')->delete();

        DB::table('payment_phases')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => '1 - Prestação',
                'slug' => '1PR',
                'created_at' => '2022-02-10 18:57:10',
                'updated_at' => '2022-02-10 18:57:10',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => '2 - Prestação',
                'slug' => '2PR',
                'created_at' => '2022-02-10 18:57:24',
                'updated_at' => '2022-02-10 18:57:24',
            ),
            2 =>
            array (
                'id' => 3,
                'slug' => 'UPR',
                'name' => 'Prestação Única',
                'created_at' => '2022-02-10 18:57:38',
                'updated_at' => '2022-02-10 18:58:06',
            ),
        ));


    }
}
