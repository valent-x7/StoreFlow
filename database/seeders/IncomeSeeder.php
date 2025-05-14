<?php

namespace Database\Seeders;

use App\Models\Income;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Llama a Factory de Incomes
        Income::factory()->count(20)->create();

    }
}
