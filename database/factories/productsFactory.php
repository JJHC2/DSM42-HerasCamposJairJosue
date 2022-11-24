<?php

namespace Database\Factories;


use App\Models\products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class productsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'color' => $this->faker->randomElement(['Rojo','Azul','Cafe','Negro','Blanco']),
            'price' => $this->faker->randomfloat(2,16,28,1),
            'name_p' => $this->faker->text(10),
            'description' => $this->faker->text(8),
            'status' => $this->faker->randomElement(['Buen Estado','Dañados']),
            'size' =>$this->faker->randomFloat(2,20,4),
            'existence' => $this->faker->randomNumber(1,60),
        ];
    }
}
