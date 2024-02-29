<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    public static string $IMAGEN_DEFAULT = 'https://images.pexels.com/photos/170811/pexels-photo-170811.jpeg';
    protected $table = 'vehiculos';

    protected $fillable =[
        'marca',
        'modelo',
        'year',
        'km',
        'precio',
        'cantidad',
        'imagen',
        'categoria_id',
        'isDeleted',
    ];

    public $timestamps = true;

    protected $hidden=[
        'isDeleted',
    ];

    protected $casts = [
        'isDeleted' => 'boolean',
    ];

    //Busquedas avanzadas

    public function scopeMarca($query, $marca){
        if($marca){
            return $query->where('marca', 'LIKE', "%$marca%");
        }
    }

    public function scopeModelo($query, $modelo){
        if($modelo){
            return $query->where('modelo', 'LIKE', "%$modelo%");
        }
    }


}
