<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo' => $this->faker->randomDigit,
            'nombre' => $this->faker->creditCardType,
            'desc' => $this->faker->sentence(),
            'marca' => $this->faker->colorName,
            'precio' => $this->faker->randomFloat(2,0,700),
            'stock' => $this->faker->randomDigit,
            'proveedor_id' => Proveedor::all()->random()->id
        ];

    
    }
}
