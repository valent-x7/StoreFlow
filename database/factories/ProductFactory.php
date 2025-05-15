<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productNames = [
            'Camiseta de Algodón Talla M',
            'Pantalón Vaquero Azul Talla 32',
            'Zapatillas Deportivas Talla 40',
            'Mochila Urbana 20L',
            'Laptop HP Pavilion 15"',
            'Smartphone Samsung Galaxy S23',
            'Tablet Amazon Fire HD 10',
            'Auriculares Inalámbricos Bluetooth',
            'Smartwatch Deportivo',
            'Botella de Agua Reutilizable 1L',
            'Libreta de Tapa Dura A5',
            'Bolígrafo de Tinta Negra (Paquete de 10)',
            'Lámpara de Escritorio LED',
            'Silla de Oficina Ergonómica',
            'Monitor LED 24"',
            'Teclado Inalámbrico',
            'Ratón Inalámbrico',
            'Disco Duro Externo 1TB',
            'Impresora Multifunción',
            'Cafetera Eléctrica',
            'Taza de Cerámica',
            'Juego de Sábanas de Algodón (Matrimonial)',
            'Toalla de Baño de Algodón',
            'Cesto de Ropa Sucia',
        ];

        $name = $this->faker->unique()->randomElement(Arr::shuffle($productNames));
        
        return [
            'name' => $name,
            'description' => fake()->paragraph(),
            'quantity' => fake()->randomNumber(2),
            'price' => fake()->randomFloat(2, 10, 10000),
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
