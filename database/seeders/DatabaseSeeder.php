<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Company::factory(30)->create();

        Employee::factory(30)->create();

        User::factory()->create([
            'name' => "Admin",
            'email' => "admin@admin.com",
            'password' => Hash::make("password")
        ]);
    }
}
