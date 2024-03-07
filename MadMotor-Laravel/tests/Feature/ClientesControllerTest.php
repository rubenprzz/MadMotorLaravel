<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Tests\TestCase;

class ClientesControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
    }

    public function testDestroy()
    {

    }

    public function testRemoveSoft()
    {

    }

    public function testShowSuccess()
    {

    }
    public function testShowUnauthorized()
    {

    }


    public function testUpdate()
    {

    }

    public function testIndex()
    {

    }

    public function testEdit()
    {

    }
}
