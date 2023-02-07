<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $timestamp = false;
    protected $fillable = ['codigoProducto', 'nombreProducto', 'descripcionProducto', 'precioProducto', 'codigoCategoria'];
}
