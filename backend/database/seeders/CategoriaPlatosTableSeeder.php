<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaPlatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'nombre' => 'Entrada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Plato Principal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Bebidas',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
