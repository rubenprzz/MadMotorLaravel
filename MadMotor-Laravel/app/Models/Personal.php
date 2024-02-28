<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
    public $casts = [
        'isDeleted' => 'boolean',
    ];

    protected $dates = [
        'FechaNacimiento',
    ];

    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';


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
