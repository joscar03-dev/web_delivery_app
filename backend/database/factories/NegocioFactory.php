<?php

namespace Database\Factories;

use App\Models\Negocio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Negocio>
 */
class NegocioFactory extends Factory
{
    protected $model = Negocio::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->company,  // Nombre aleatorio del negocio
            'imagen' => 'negocios/default.jpg',
            'tipo_negocio_id' => $this->faker->numberBetween(1, 4),  // Número entre 1 y 4 (ya que tienes 4 tipos de negocios: Comida, Licor, Tiendas, Servicios)
            'direccion' => $this->faker->address,  // Dirección aleatoria
            'telefono' => $this->faker->phoneNumber,  // Número de teléfono aleatorio
            'email' => $this->faker->unique()->safeEmail,  // Email único y seguro
            'horario_atencion' => 'Lunes a Domingo, ' . $this->faker->time('H:i') . ' a ' . $this->faker->time('H:i'), // Horario aleatorio
            'created_at' => now(),
            'updated_at' => now(),
            'hora_apertura' => $this->faker->time('H:i'),  // Hora de apertura aleatoria
            'hora_cierre' => $this->faker->time('H:i'),  // Hora de cierre aleatoria
            
        ];
    }
}
