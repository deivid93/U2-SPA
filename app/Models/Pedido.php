<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];

    protected $table    = "pedidos";
    protected $fillable = [
        'cantidad', 'desc', 'fecha_entrega', 'created_at', 'updated_at'
    ];

    public function productos()
    {
        //return $this->belongsToMany('App\Models\Producto', 'pedidos_productos', 'producto_id', 'pedido_id')->withPivot('id');
        return $this->belongsToMany('App\Models\Producto', 'pedidos_productos');
    }

}
