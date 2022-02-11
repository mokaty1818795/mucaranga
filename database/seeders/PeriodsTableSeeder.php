<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PeriodsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('periods')->delete();

        DB::table('periods')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Manha',
                'created_at' => '2022-02-08 11:57:42',
                'updated_at' => '2022-02-10 16:25:08',
                'init_at' => '2022-02-10 05:30:00',
                'end_at' => '2022-02-10 06:00:00',
            ),
        ));


    }
}
