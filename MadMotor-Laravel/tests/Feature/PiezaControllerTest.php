<?php

namespace Tests\Feature;

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Pieza;
use Tests\TestCase;

class PiezaControllerTest extends TestCase

{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
    }

    public function testStore()
    {
        $piezas = Pieza::factory()->count(5)->make();
        $response = $this->post(route('piezas.store'), $piezas->toArray());
        $response->assertStatus(302);
        $response->assertRedirect('http://localhost');

        $pieza = Pieza::where('nombre', $piezas->first()->nombre)->first();
        $this->assertNull($pieza);
        $data = [
            'nombre' => '',
            'descripcion' => '',
            'precio' => 'abc',
            'cantidad' => '-1',
            'categoria_id' => '',
            'imagen' => '',
        ];

        $response = $this->post('/piezas', $data);
        $response->assertSessionHasErrors([
            'nombre',
            'descripcion',
            'precio',
            'cantidad',
            'categoria_id',
            'imagen',
        ]);
    }





    public function testUpdateSuccess()
    {
        $pieza = Pieza::factory()->create();
        $data = [
            'nombre' => 'Pieza actualizada',
            'descripcion' => 'Descripción de la pieza actualizada',
            'precio' => 20.0,
            'cantidad' => 2,
            'categoria_id' => '1',
        ];

        $response = $this->put('/piezas/' . $pieza->id, $data);

        $pieza = Pieza::find($pieza->id);
        $this->assertEquals('Pieza actualizada', $pieza->nombre, 'The name should be updated');
        $this->assertEquals('Descripción de la pieza actualizada', $pieza->descripcion, 'The description should be updated');
        $this->assertEquals(20.0, $pieza->precio, 'The price should be updated');
        $this->assertEquals(2, $pieza->cantidad, 'The quantity should be updated');
        $this->assertEquals('1', $pieza->categoria_id, 'The category should be updated');
    }

    public function testUpdateValidation()
    {
        $pieza = Pieza::factory()->create();
        $data = [
            'nombre' => '',
            'descripcion' => '',
            'precio' => 'abc',
        ];

        $response = $this->put('/piezas/' . $pieza->id, $data);

        $response->assertSessionHasErrors([
            'nombre',
            'descripcion',
            'precio',
        ], 'Validation errors should be present');
    }





    public function testCreate()
    {
        $response = $this->get('/piezas/create');
        $response->assertViewIs('piezas.create');

        $response = $this->get('/piezas/create');
    }






    public function testShow()
    {
        $pieza = Pieza::factory()->create();
        $response = $this->get('/piezas/' . $pieza->id);
        $response->assertViewIs('piezas.show');

        $pieza = Pieza::factory()->create();
        $response = $this->get('/piezas/' . $pieza->id);
        $response->assertSee($pieza->nombre);
        $response->assertSee($pieza->descripcion);
        $response->assertSee($pieza->precio);
        $response->assertSee($pieza->cantidad);

    }


    public function testIndex()
    {
        $response = $this->get('/piezas');
        $response->assertViewIs('piezas.index');
        $piezas = Pieza::all();
        $this->assertEquals(8, $piezas->count());
    }

    public function testEdit()
    {
        $pieza = Pieza::factory()->create();
        $response = $this->get('/piezas/' . $pieza->id . '/edit');
        $response->assertViewIs('piezas.edit');

        $pieza = Pieza::factory()->create();
        $response = $this->get('/piezas/' . $pieza->id . '/edit');
        $response->assertSee($pieza->nombre);
        $response->assertSee($pieza->descripcion);
        $response->assertSee($pieza->precio);
        $response->assertSee($pieza->cantidad);

    }

}
