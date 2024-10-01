<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    protected $model = Producto::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,  // Nombre aleatorio del producto
            'descripcion' => $this->faker->sentence,  // Descripción aleatoria
            'precio' => $this->faker->randomFloat(2, 5, 100),  // Precio aleatorio entre 5 y 100
            'imagen' => 'productos/default.jpg',  // Imagen por defecto
            'categoria_id' => Categoria::factory(),  // Relacionar con una categoría
            'negocio_id' => Categoria::find($this->faker->numberBetween(1, 50))->negocio_id,  // Tomar el negocio de la categoría
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
