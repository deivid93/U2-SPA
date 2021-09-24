<?php

namespace Database\Factories;

use App\Models\PedidoProducto;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PedidoProducto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pedido_id' => Pedido::all()->random()->id,
            'producto_id' => Producto::all()->random()->id
        ];
    }
}
