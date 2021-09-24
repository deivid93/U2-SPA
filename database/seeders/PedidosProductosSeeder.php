<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\PedidoProducto;
use Illuminate\Support\Facades\DB;

class PedidosProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PedidoProducto::factory()->count(70)->create();
    }
}
