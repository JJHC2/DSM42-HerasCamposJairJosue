<?php

namespace Database\Factories;

use App\Models\products;
use App\Models\usuarios;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class inventoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'status'=>$this->faker->randomElement(['DISPONIBLE','NO DISPONIBLE']),
            'product_id'=> products::InRandomOrder()->first()->id,
            'usuario_id'=>usuarios::InRandomOrder()->first()->id,
        ];
    }
}
