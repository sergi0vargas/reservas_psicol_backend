<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \DB::table('clientes')->insert([
            'documento' => 123456,
            'nombre' => 'Sergio Vargas',
            'correo' => 'sergio@gmail.com',
            'telefono' => '+57302455333',
            'direccion' => 'La calle de sergio 123',
        ]);

        \DB::table('clientes')->insert([
            'documento' => 123457,
            'nombre' => 'Andres Rodriguez',
            'correo' => 'andres@gmail.com',
            'telefono' => '+573001234567',
            'direccion' => 'La calle de andres 456',
        ]);

        \DB::table('eventos')->insert([
            'titulo' => 'Desfile 1',
            'descripcion' => 'Desfile numero 1',
            'fecha_evento' => \Carbon\carbon::now()->addWeek(),
            'aforo' => '3',
            'vendidas' => '0',
        ]);

        \DB::table('eventos')->insert([
            'titulo' => 'Carnaval 1',
            'descripcion' => 'Carnaval numero 1',
            'fecha_evento' => \Carbon\carbon::now()->addWeeks('2'),
            'aforo' => '5',
            'vendidas' => '0',
        ]);
    }
}
