<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NegociosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('negocios')->insert([
            // Negocios para el tipo "Comida"
            [
                'nombre' => 'Restaurante A',
                'imagen' => 'negocios/negocio1.jpg',
                'tipo_negocio_id' => 5, // Comida
                'direccion' => 'Av. Comida 123',
                'telefono' => '999111111',
                'email' => 'restaurantea@correo.com',
                'horario_atencion' => 'Lunes a Viernes, 8am a 5pm',
                'hora_apertura' => '08:00:00',
                'hora_cierre' => '17:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Restaurante B',
                'imagen' => 'negocios/negocio2.jpeg',
                'tipo_negocio_id' => 5,
                'direccion' => 'Av. Comida 456',
                'telefono' => '999222222',
                'email' => 'restauranteb@correo.com',
                'horario_atencion' => 'Lunes a Viernes, 9am a 6pm',
                'hora_apertura' => '09:00:00',
                'hora_cierre' => '18:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Cafetería C',
                'imagen' => 'negocios/negocio3.jpg',
                'tipo_negocio_id' => 5,
                'direccion' => 'Calle Comida 789',
                'telefono' => '999333333',
                'email' => 'cafeteriac@correo.com',
                'horario_atencion' => 'Lunes a Sábado, 10am a 6pm',
                'hora_apertura' => '10:00:00',
                'hora_cierre' => '18:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Pizzería D',
                'imagen' => 'negocios/negocio4.jpg',
                'tipo_negocio_id' => 5,
                'direccion' => 'Plaza Comida 101',
                'telefono' => '999444444',
                'email' => 'pizzeriad@correo.com',
                'horario_atencion' => 'Lunes a Domingo, 12pm a 10pm',
                'hora_apertura' => '12:00:00',
                'hora_cierre' => '22:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Negocios para el tipo "Licor"
            [
                'nombre' => 'Bar A',
                'imagen' => 'negocios/negocio5.webp',
                'tipo_negocio_id' => 6, // Licor
                'direccion' => 'Av. Licor 123',
                'telefono' => '999555555',
                'email' => 'bara@correo.com',
                'horario_atencion' => 'Lunes a Domingo, 5pm a 12am',
                'hora_apertura' => '17:00:00',
                'hora_cierre' => '00:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Discoteca B',
                'imagen' => 'negocios/negocio6.webp',
                'tipo_negocio_id' => 6,
                'direccion' => 'Calle Licor 456',
                'telefono' => '999666666',
                'email' => 'discotecab@correo.com',
                'horario_atencion' => 'Viernes a Domingo, 8pm a 4am',
                'hora_apertura' => '20:00:00',
                'hora_cierre' => '04:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Taberna C',
                'imagen' => 'negocios/negocio7.jpg',
                'tipo_negocio_id' => 6,
                'direccion' => 'Plaza Licor 789',
                'telefono' => '999777777',
                'email' => 'tabernac@correo.com',
                'horario_atencion' => 'Lunes a Domingo, 6pm a 1am',
                'hora_apertura' => '18:00:00',
                'hora_cierre' => '01:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Pub D',
                'imagen' => 'negocios/negocio8.jpg',
                'tipo_negocio_id' => 6,
                'direccion' => 'Calle Licor 101',
                'telefono' => '999888888',
                'email' => 'pubd@correo.com',
                'horario_atencion' => 'Lunes a Domingo, 7pm a 2am',
                'hora_apertura' => '19:00:00',
                'hora_cierre' => '02:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Negocios para el tipo "Tiendas"
            [
                'nombre' => 'Supermercado A',
                'imagen' => 'negocios/negocio9.jpg',
                'tipo_negocio_id' => 7, // Tiendas
                'direccion' => 'Av. Tiendas 123',
                'telefono' => '999999999',
                'email' => 'supera@correo.com',
                'horario_atencion' => 'Lunes a Domingo, 8am a 8pm',
                'hora_apertura' => '08:00:00',
                'hora_cierre' => '20:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Mini Market B',
                'imagen' => 'negocios/negocio10.jpg',
                'tipo_negocio_id' => 7,
                'direccion' => 'Calle Tiendas 456',
                'telefono' => '998888888',
                'email' => 'marketb@correo.com',
                'horario_atencion' => 'Lunes a Sábado, 7am a 9pm',
                'hora_apertura' => '07:00:00',
                'hora_cierre' => '21:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Ferretería C',
                'imagen' => 'negocios/negocio11.jpg',
                'tipo_negocio_id' => 7,
                'direccion' => 'Calle Tiendas 789',
                'telefono' => '997777777',
                'email' => 'ferreteriac@correo.com',
                'horario_atencion' => 'Lunes a Domingo, 8am a 5pm',
                'hora_apertura' => '08:00:00',
                'hora_cierre' => '17:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Librería D',
                'imagen' => 'negocios/negocio12.jpg',
                'tipo_negocio_id' => 7,
                'direccion' => 'Plaza Tiendas 101',
                'telefono' => '996666666',
                'email' => 'libreriad@correo.com',
                'horario_atencion' => 'Lunes a Sábado, 9am a 6pm',
                'hora_apertura' => '09:00:00',
                'hora_cierre' => '18:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Negocios para el tipo "Servicios"
            [
                'nombre' => 'Taller Mecánico A',
                'imagen' => 'negocios/negocio13.jpg',
                'tipo_negocio_id' => 8, // Servicios
                'direccion' => 'Av. Servicios 123',
                'telefono' => '995555555',
                'email' => 'tallera@correo.com',
                'horario_atencion' => 'Lunes a Sábado, 8am a 6pm',
                'hora_apertura' => '08:00:00',
                'hora_cierre' => '18:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Lavandería B',
                'imagen' => 'negocios/negocio14.jpg',
                'tipo_negocio_id' => 8,
                'direccion' => 'Calle Servicios 456',
                'telefono' => '994444444',
                'email' => 'lavanderiab@correo.com',
                'horario_atencion' => 'Lunes a Domingo, 9am a 8pm',
                'hora_apertura' => '09:00:00',
                'hora_cierre' => '20:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Servicios Técnicos C',
                'imagen' => 'negocios/negocio15.jpeg',
                'tipo_negocio_id' => 8,
                'direccion' => 'Calle Servicios 789',
                'telefono' => '993333333',
                'email' => 'serviciosc@correo.com',
                'horario_atencion' => 'Lunes a Viernes, 8am a 6pm',
                'hora_apertura' => '08:00:00',
                'hora_cierre' => '18:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Servicios Eléctricos D',
                'imagen' => 'negocios/negocio16.jpeg',
                'tipo_negocio_id' => 8,
                'direccion' => 'Plaza Servicios 101',
                'telefono' => '992222222',
                'email' => 'serviciosd@correo.com',
                'horario_atencion' => 'Lunes a Sábado, 7am a 5pm',
                'hora_apertura' => '07:00:00',
                'hora_cierre' => '17:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
