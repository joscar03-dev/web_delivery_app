<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoNegociosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos_negocios')->insert([
            [
                'nombre' => 'Comida',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Licor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Tiendas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Servicios',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
