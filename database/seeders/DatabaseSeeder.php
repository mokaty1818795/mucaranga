<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = User::find(1);
        //$role = Role::create(['name'=>'root']);
        //Role::create(['name'=>'director']);
        //Role::create(['name'=>'funcionario']);
        //Role::create(['name'=>'default']);

        $user->assignRole(['root']);




    }
}
