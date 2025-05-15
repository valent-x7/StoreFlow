<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Factory de usuario
        // User::factory(10)->create();

        // Ejecutar ProductSeeder
        $this->call(ProductSeeder::class);

        // Ejecutar IncomeSeeder
        // $this->call(IncomeSeeder::class);
    }
}
