<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('personal')->insert([
            [
                'nombre' => 'Ruben',
                'apellidos' => 'Fernandez Perez',
                'fecha_nacimiento' => '1990-01-01',
                'dni' => '12345678A',
                'direccion' => 'Calle Falsa 123',
                'telefono' => 123456789,
                'sueldo' => 1000,
                'iban' => 'ES123456789123456789',
                'email' => 'rubenoide@gmail.com',
                'rol' => 'personal',
            ],
            [
                'nombre' => 'Miguel',
                'apellidos' => 'Vicario Rubio',
                'fecha_nacimiento' => '1990-01-01',
                'dni' => '12345678B',
                'direccion' => 'Calle Falsa 123',
                'telefono' => 123456789,
                'sueldo' => 1000,
                'iban' => 'ES123456789123456789',
                'email' => 'miguel@gmail.com',
                'rol' => 'personal',
            ],
            [
                'nombre' => 'Jose',
                'apellidos' => 'Punto Random',
                'fecha_nacimiento' => '1990-01-01',
                'dni' => '12345678C',
                'direccion' => 'Calle Falsa 123',
                'telefono' => 123456789,
                'sueldo' => 1000,
                'iban' => 'ES123456789123456789',
                'email' => 'josito.random@gmail.com',
                'rol' => 'personal',
            ],
            [
                'nombre' => 'Moha',
                'apellidos' => 'El Kasmi Sanchez',
                'fecha_nacimiento' => '1990-01-01',
                'dni' => '12345678D',
                'direccion' => 'Calle Falsa 123',
                'telefono' => 123456789,
                'sueldo' => 1000,
                'iban' => 'ES123456789123456789',
                'email' => 'moha@gmail.com',
                'rol' => 'admin',
            ],
            [
                'nombre' => 'Luis',
                'apellidos' => 'Robles Garcia',
                'fecha_nacimiento' => '1990-01-01',
                'dni' => '12345678E',
                'direccion' => 'Calle Falsa 123',
                'telefono' => 123456789,
                'sueldo' => 1000,
                'iban' => 'ES123456789123456789',
                'email' => 'luis@gmail.com',
                'rol' => 'personal',
            ]
            ]);
    }
}
