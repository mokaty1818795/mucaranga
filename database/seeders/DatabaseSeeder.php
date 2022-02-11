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
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(CivilStatesTableSeeder::class);
        $this->call(VeicleClassesTableSeeder::class);
        $this->call(PeriodsTableSeeder::class);
        $this->call(PaymentPhasesTableSeeder::class);
        $root = User::where('email','administrator@ecm.com')->first();
        $director = User::where('email','director@ecm.com')->first();
        $root->assignRole(['Root']);
        $director->assignRole(['Director']);
    }
}
