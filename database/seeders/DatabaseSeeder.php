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
        $this->call(DocumentTypeSeeder::class);
        $root = User::where('email','administrator@ecm.com')->first();
        $director = User::where('email','director@ecm.com')->first();
        $instructor  = User::where('email', 'instrutor@ecm.com')->first();
        $employee  = User::where('email', 'employee@ecm.com')->first();
        $dafault  = User::where('email', 'default@ecm.com')->first();
        $root->assignRole(['Root']);
        $director->assignRole(['Director']);
        $instructor->assignRole(['Instructor']);
        $employee->assignRole(['Employee']);
        $dafault->assignRole(['Default']);
    }
}
