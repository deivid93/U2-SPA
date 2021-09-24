<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProducto extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];

    protected $table    = "pedidos_productos";
    protected $fillable = [
        'pedido_id', 'producto_id', 'created_at', 'updated_at'
    ];

}
