<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Negocio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    protected $model = Categoria::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->randomElement([
                'Entrada', 
                'Plato Principal', 
                'Postre', 
                'Bebidas', 
                'Aperitivos', 
                'Comida Rápida', 
                'Comida Saludable'
            ]),  // Genera un nombre aleatorio de la lista de categorías
            'negocio_id' => Negocio::factory(),  // Relacionado con un negocio
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
