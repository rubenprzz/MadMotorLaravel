<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    public static string $IMAGEN_DEFAULT = 'https://cdn.autobild.es/sites/navi.axelspringer.es/public/bdc/dc/fotos/Ferrari_F8_Tributo_001_.jpg?tf=200x';
    protected $table = 'vehiculos';

    protected $fillable = [
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

    protected $hidden = [
        'isDeleted',
    ];

    protected $casts = [
        'isDeleted' => 'boolean',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    //Busquedas avanzadas

    public function scopeMarca($query, $marca)
    {
        return $query->where('LOWER(marca) LIKE ? ', ['%' . strtolower($marca) . '%']);


    }

    public function scopeModelo($query, $modelo)
    {
        return $query->where('LOWER(modelo) LIKE ? ', ['%' . strtolower($modelo) . '%']);

    }

    public function scopeYearMin($query, $yearMin)
    {
        return $query->where('year', '>=', $yearMin);
    }

    public function scopeYearMax($query, $yearMax)
    {
        return $query->where('year', '<=', $yearMax);
    }

    public function scopeKmMin($query, $kmMin)
    {
        return $query->where('km', '>=', $kmMin);
    }

    public function scopeKmMax($query, $kmMax)
    {
        return $query->where('km', '<=', $kmMax);
    }

    public function scopePrecioMin($query, $precioMin)
    {
        if ($precioMin) {
            return $query->where('precio', '>=', $precioMin);
        }
    }

    public function scopePrecioMax($query, $precioMax)
    {
        if ($precioMax) {
            return $query->where('precio', '<=', $precioMax);
        }
    }

    public function scopeOrderByPrecioAcs($query)
    {
        return $query->orderBy('precio', 'asc');
    }

    public function scopeOrderByPrecioDesc($query)
    {
        return $query->orderBy('precio', 'desc');
    }

    public function scopeOrderByYearAcs($query)
    {
        return $query->orderBy('year', 'asc');
    }

    public function scopeOrderByYearDesc($query)
    {
        return $query->orderBy('year', 'desc');
    }

    public function scopeOrderByKmAcs($query)
    {
        return $query->orderBy('km', 'asc');
    }

    public function scopeOrderByKmDesc($query)
    {
        return $query->orderBy('km', 'desc');
    }
}
