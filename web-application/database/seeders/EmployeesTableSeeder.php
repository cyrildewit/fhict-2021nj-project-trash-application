<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'name' => 'Cyril de Wit',
            'email' => 'cyril@projecttrash.nl',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
    }
}
