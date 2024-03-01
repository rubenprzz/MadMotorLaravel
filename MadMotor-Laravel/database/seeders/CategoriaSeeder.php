<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['nombre' => 'Clásicos'],
            ['nombre' => 'Deportivos'],
            ['nombre' => 'SUV'],
            ['nombre' => 'Sedán'],
            ['nombre' => 'Hatchback'],
            ['nombre' => 'Pickup'],
            ['nombre' => 'Familiar'],
            ['nombre' => 'Van'],
            ['nombre' => 'Convertible'],
            ['nombre' => 'Coupé'],
            ['nombre' => 'Eléctricos'],
            ['nombre' => 'Híbridos'],
        ]);
    }
}
