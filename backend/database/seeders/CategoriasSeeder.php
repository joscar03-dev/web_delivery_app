<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Negocio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $negocios = Negocio::all();

        $negocios->each(function ($negocio){
            Categoria::factory()->count(4)->create([
                'negocio_id' => $negocio->id,
            ]);
        });
    }
}
