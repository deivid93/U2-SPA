<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('codigo')->nullable()->default(12);
            $table->string('nombre', 100)->nullable();
            $table->text('desc')->nullable();
            $table->string('marca', 100)->nullable();
            $table->float('precio')->nullable()->default(123.45);
            $table->bigInteger('stock')->nullable()->default(0);
            $table->foreignId('proveedor_id')->nullable()->constrained('proveedores');        
    
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
