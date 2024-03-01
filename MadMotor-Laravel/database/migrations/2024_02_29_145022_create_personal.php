<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('fecha_nacimiento');
            $table->string('dni')->unique();
            $table->string('direccion');
            $table->integer('telefono');
            $table->decimal('sueldo');
            $table->string('iban');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('rol')->default('empleado');
            $table->boolean('isDeleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal');
    }
};
