<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PiezaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('piezas')->insert([
            [
                'nombre' => 'Filtro de aire',
                'precio' => 20.50,
                'descripcion' => 'Filtro de aire de alta calidad para motores de gasolina.',
                'cantidad' => 100,
                'imagen' => 'https://ejemplo.com/filtro_aire.jpg',
                'categoria_id' => 12,
                'isDeleted' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Pastillas de freno',
                'precio' => 35.75,
                'descripcion' => 'Pastillas de freno cerámicas para un frenado suave y eficiente.',
                'cantidad' => 80,
                'imagen' => 'https://ejemplo.com/pastillas_freno.jpg',
                'categoria_id' => 13,
                'isDeleted' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Bujías de encendido',
                'precio' => 8.99,
                'descripcion' => 'Bujías de encendido de platino para una chispa más potente y duradera.',
                'cantidad' => 120,
                'imagen' => 'https://ejemplo.com/bujias_encendido.jpg',
                'categoria_id' => 14,
                'isDeleted' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
