<?php

namespace App\Http\Models;

class Personal extends Model {
    protected $table = 'personal';
    protected $fillable = [
        'nombre',
        'apellidos',
        'FechaNacimiento',
        'dni',
        'direccion',
        'telefono',
        'sueldo',
        'iban',
        'email',
        'isDeleted',
    ];

    protected $hidden = [
        'isDeleted'=> 'boolean',
    ];

    public static function boot() {
        parent::boot();

        static::creating(function ($personal) {
            $personal->uuid = Str::uuid();
        });
    }
}
