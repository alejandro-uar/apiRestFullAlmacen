<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Marca extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion'];

    // Una marca puede tener muchos productos asociados
    public function producto()
    {
        return $this->hasMany(Producto::class);
    }
}
