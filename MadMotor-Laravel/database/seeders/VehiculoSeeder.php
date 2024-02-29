<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehiculos')->insert([
            [
                'marca' => 'Ferrarri',
                'modelo' => 'F8',
                'year' => 2021,
                'precio' => 1000000,
                'cantidad' => 10,
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Seat',
                'modelo' => 'Ibiza',
                'year' => 2015,
                'precio' => 10000,
                'cantidad' => 990,
                'categoria_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Chevrolet',
                'modelo' => 'Camaro',
                'year' => 2020,
                'precio' => 50000,
                'cantidad' => 100,
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Ford',
                'modelo' => 'F150',
                'year' => 2021,
                'precio' => 60000,
                'cantidad' => 50,
                'categoria_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Nissan',
                'modelo' => 'Versa',
                'year' => 2021,
                'precio' => 20000,
                'cantidad' => 200,
                'categoria_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

    }
}
