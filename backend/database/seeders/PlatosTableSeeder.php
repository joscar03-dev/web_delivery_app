<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('platos')->insert([
            [
                'nombre' => 'Ensalada Mixta',
                'descripcion' => 'Ensalada fresca con lechuga, tomate, pepino y cebolla.',
                'precio' => 12.50,
                'imagen' => 'platos/EnsaladaMixta.jpeg',
                'categoria_id' => 1, // Entrada
                'negocio_id' => 34, // Suponiendo que el negocio 1 es de tipo comida
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Pollo a la brasa',
                'descripcion' => 'Pollo a la brasa servido con papas fritas y ensalada.',
                'precio' => 35.00,
                'imagen' => 'platos/polloBrasa.jpg',
                'categoria_id' => 2, // Plato Principal
                'negocio_id' => 34, // Suponiendo que el negocio 1 es de tipo comida
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Lomo Saltado',
                'descripcion' => 'Lomo saltado con papas fritas, arroz y ensalada.',
                'precio' => 28.00,
                'imagen' => 'platos/lomo_saltado.jpg',
                'categoria_id' => 2, // Plato Principal
                'negocio_id' => 35, // Suponiendo que el negocio 1 es de tipo comida
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Inca Kola',
                'descripcion' => 'Bebida gaseosa nacional.',
                'precio' => 5.00,
                'imagen' => 'platos/inka-kola.jpeg',
                'categoria_id' => 3, // Bebidas
                'negocio_id' => 35, // Suponiendo que el negocio 1 es de tipo comida
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Más platos para otros negocios de comida
            [
                'nombre' => 'Ceviche',
                'descripcion' => 'Ceviche de pescado fresco.',
                'precio' => 30.00,
                'imagen' => 'platos/ceviche.jpeg',
                'categoria_id' => 2, // Plato Principal
                'negocio_id' => 36, // Suponiendo que el negocio 2 es de tipo comida
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Jugo de Naranja',
                'descripcion' => 'Jugo natural de naranja.',
                'precio' => 7.00,
                'imagen' => 'platos/jugo-naranja.jpg',
                'categoria_id' => 3, // Bebidas
                'negocio_id' => 36, // Suponiendo que el negocio 2 es de tipo comida
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
