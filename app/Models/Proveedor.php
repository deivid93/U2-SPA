<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];
    protected $table    = "proveedores";
    protected $fillable = [
        'nombre', 'created_at', 'updated_at'
    ];

    
}
