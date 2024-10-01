<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = Categoria::all();

        // Para cada categoría, generar 10 productos
        $categorias->each(function ($categoria) {
            Producto::factory()->count(10)->create([
                'categoria_id' => $categoria->id,  // Relacionar el producto con la categoría
                'negocio_id' => $categoria->negocio_id,  // Relacionar el producto con el negocio
            ]);
        });
    }
}
