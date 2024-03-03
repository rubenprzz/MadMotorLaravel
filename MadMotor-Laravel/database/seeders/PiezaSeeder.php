<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class PiezaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('piezas')->insert([
            ['id' => Uuid::uuid4(),

                'nombre' => 'Filtro de aire',
                'precio' => 20.50,
                'descripcion' => 'Filtro de aire de alta calidad para motores de gasolina.',
                'cantidad' => 100,
                'categoria_id' => 12,
                'isDeleted' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['id' => Uuid::uuid4(),

                'nombre' => 'Pastillas de freno',
                'precio' => 35.75,
                'descripcion' => 'Pastillas de freno cerámicas para un frenado suave y eficiente.',
                'cantidad' => 80,
                'categoria_id' => 13,
                'isDeleted' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['id' => Uuid::uuid4(),
                'nombre' => 'Bujías de encendido',
                'precio' => 8.99,
                'descripcion' => 'Bujías de encendido de platino para una chispa más potente y duradera.',
                'cantidad' => 120,
                'categoria_id' => 14,
                'isDeleted' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['id' => Uuid::uuid4(),
                'nombre' => 'Amortiguadores traseros',
                'precio' => 89.99,
                'descripcion' => 'Amortiguadores traseros de alta calidad para una conducción suave y segura.',
                'cantidad' => 50,
                'categoria_id' => 10,
                'isDeleted' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['id' => Uuid::uuid4(),
                'nombre' => 'Radiador de aluminio',
                'precio' => 120.25,
                'descripcion' => 'Radiador de aluminio de alta eficiencia para mantener el motor fresco.',
                'cantidad' => 40,
                'categoria_id' => 12,
                'isDeleted' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);
    }
}
