<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];

    protected $table    = "productos";
    protected $fillable = [
        'codigo', 'nombre', 'desc', 'marca', 'precio',
        'stock', 'proveedor_id', 'created_at', 'updated_at'
    ];

    public function proveedores()
    {
        return $this->belongsTo('App\Models\Proveedor');
    }

    public function pedidos()
    {
        //return $this->belongsToMany('App\Models\Pedido', 'pedidos_productos','pedido_id','producto_id')->withPivot('id');
        return $this->belongsToMany('App\Models\Pedido', 'pedidos_productos');
    }

}
