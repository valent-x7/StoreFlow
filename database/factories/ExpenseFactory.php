<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $expenseTypes = [
            'Alquiler de Local',
            'Salarios Empleados',
            'Servicios (Agua, Luz, Gas)',
            'Marketing y Publicidad',
            'Compra de Insumos',
            'Mantenimiento de Equipo',
            'Transporte y Combustible',
            'Impuestos y Permisos',
            'Seguros',
            'Suministros de Oficina',
            'Reparaciones',
            'Software y Licencias',
            'Comisiones de Venta',
            'Gastos Legales',
            'Contabilidad',
            'Capacitación del Personal',
            'Viajes de Negocios',
            'Suscripciones',
            'Donaciones',
            'Pérdidas por Devolución',
        ];
    
        $name = $this->faker->randomElement(Arr::shuffle($expenseTypes));
        
        $randomMonth = $this->faker->numberBetween(1, 12);
        $createdAt = Carbon::create(2025, $randomMonth, $this->faker->numberBetween(1, Carbon::create(2025, $randomMonth, 1)->daysInMonth));

        // Generar updatedAt dentro del mismo mes o el siguiente
        $updateMonth = $this->faker->randomElement([$randomMonth, ($randomMonth % 12) + 1]); // Mismo mes o siguiente
        $updateYear = 2025 + (($randomMonth === 12 && $updateMonth === 1) ? 1 : 0); // Si cambia de diciembre a enero, cambia el año
        $updatedAtDay = $this->faker->numberBetween(1, Carbon::create($updateYear, $updateMonth, 1)->daysInMonth);
        $updatedAt = Carbon::create($updateYear, $updateMonth, $updatedAtDay, $this->faker->numberBetween(0, 23), $this->faker->numberBetween(0, 59), $this->faker->numberBetween(0, 59));

        return [
            'name' => $name,
            'description' => fake()->sentence(),
            'amount' => fake()->randomFloat(2, 5, 5000),
            'user_id' => 1,
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ];
    }
}
