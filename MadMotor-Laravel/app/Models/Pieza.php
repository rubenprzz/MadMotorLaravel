<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{
    use HasFactory;

    public static string $IMAGE_DEFAULT = 'https://th.bing.com/th/id/OIP.KfJHc987dlOGUVkAhwwcGAHaE8?rs=1&pid=ImgDetMain';
    protected $fillable = [
        'nombre',
        'precio',
        'descripcion',
        'cantidad',
        'imagen',
        'categoria_id',
        'isDeleted'


    ];
    protected $hidden = [
        'isDeleted',
    ];

    protected $casts = [
        'isDeleted' => 'boolean',
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






