<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Compra;


class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'cantidad_disponible',
        'categoria_id',
        'marca_id'
    ];

    // Un producto pertenece a una unica categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Un producto pertenece a una unica marca
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    // Un producto pertenecer a varias instancias de compras y viceversa
    public function compras()
    {
        return $this->belongsToMany(Compra::class)->withPivot('precio', 'cantidad', 'subtotal')->withTimestamps();
    }
}
