<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{
    use HasFactory;

    public static string $IMAGE_DEFAULT = 'https://placehold.co/400x400';
    protected $fillable = [
        'nombre',
        'precio',
        'descripcion',
        'cantidad',
        'imagen',
        'category_id'


    ];

    public function category()
    {
    return $this->belongsTo(Categoria::class);
    }
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('name', 'LIKE', "%$search%");
        }
    }
}






