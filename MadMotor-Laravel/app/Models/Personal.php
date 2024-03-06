<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class Personal extends Authenticatable {

    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'personal';
    protected $fillable = [
        'nombre',
        'apellidos',
        'fechaNacimiento',
        'dni',
        'direccion',
        'telefono',
        'sueldo',
        'iban',
        'email',
        'password',
        'rol',
        'isDeleted',
    ];
    public $casts = [
        'isDeleted' => 'boolean',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function  scopeSearch($query, $search)
    {
        return $query->whereRaw('LOWER(nombre) LIKE ?', ["%" . strtolower($search) . "%"])
            ->orWhereRaw('LOWER(dni) LIKE ?', ["%" . strtolower($search) . "%"]);
    }
    }
