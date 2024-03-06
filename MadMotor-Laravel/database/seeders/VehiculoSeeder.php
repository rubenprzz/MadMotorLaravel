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
                'marca' => 'Ferrari',
                'modelo' => 'F8',
                'year' => 2021,
                'km' => 0,
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
                'km' => 100000,
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
                'km' => 80900,
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
                'km' => 0,
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
                'km' => 9000,
                'precio' => 20000,
                'cantidad' => 200,
                'categoria_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Toyota',
                'modelo' => 'Corolla',
                'year' => 2021,
                'km' => 0,
                'precio' => 25000,
                'cantidad' => 100,
                'categoria_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Chevrolet',
                'modelo' => 'Aveo',
                'year' => 2015,
                'km' => 100000,
                'precio' => 10000,
                'cantidad' => 100,
                'categoria_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Chevrolet',
                'modelo' => 'Spark',
                'year' => 2015,
                'km' => 100000,
                'precio' => 10000,
                'cantidad' => 100,
                'categoria_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Chevrolet',
                'modelo' => 'Cruze',
                'year' => 2015,
                'km' => 100000,
                'precio' => 10000,
                'cantidad' => 100,
                'categoria_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Chevrolet',
                'modelo' => 'Malibu',
                'year' => 2015,
                'km' => 100000,
                'precio' => 10000,
                'cantidad' => 100,
                'categoria_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Chevrolet',
                'modelo' => 'Camaro',
                'year' => 2015,
                'km' => 100000,
                'precio' => 10000,
                'cantidad' => 100,
                'categoria_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);


    }
}
