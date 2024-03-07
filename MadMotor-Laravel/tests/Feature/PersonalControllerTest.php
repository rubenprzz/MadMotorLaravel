<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Personal;
use PHPUnit\Event\Runtime\OperatingSystem;
use Tests\TestCase;

class PersonalControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
    }

    public function testIndex()
    {
        $response = $this->get('/personal');
        $response->assertStatus(200);
        $response->assertViewIs('personal.index');
        $personal = Personal::all();
        $this->assertEquals(5, $personal->count());


    }


    public function testShow()
    {
        $personal = Personal::factory()->create();

        $response = $this->get('/personal/show/' . $personal->id);
        $response->assertStatus(200);
        $response->assertViewIs('personal.show');

        // Test non-existent ID
        $response = $this->get('/personal/1000');
        $response->assertStatus(404);

    }

    public function testEdit()
    {
        $personal = Personal::factory()->create();

        $response = $this->get('/personal/' . $personal->id . '/edit');
        $response->assertStatus(200);
        $response->assertViewIs('personal.edit');

        // Test non-existent ID
        $response = $this->get('/personal/1000/edit');
        $response->assertStatus(404);
    }


    public function testCreate()
    {
        $response = $this->get('/personal/create');
        $response->assertStatus(200);
        $response->assertViewIs('personal.create');

    }





    public function testStore()
    {
        $data = [
            'nombre' => 'Test Name',
            'apellidos' => 'Test Last Name',
            'fecha_nacimiento' => '1990-01-01',
            'dni' => '123456789',
            'direccion' => 'Test Address',
            'telefono' => '1234567890',
            'sueldo' => '5000',
            'iban' => 'ES12345678901234567890',
            'email' => 'test@example.com',
            'password' => 'secret123',
            'role' => 'user',
        ];

        $this->post('/personal', $data)->assertStatus(405);

        $personal = Personal::where('email', $data['email'])->first();
        $this->assertNull($personal);
    }

}
