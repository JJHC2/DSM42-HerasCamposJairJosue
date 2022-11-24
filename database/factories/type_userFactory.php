<?php

namespace Database\Factories;

use App\Models\usuarios;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model> 
 */
class type_userFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    

    {
        return [
           'type'=>$this->faker->randomElement(['Administrador','Usuario']),
           'users_id'=> usuarios::InRandomOrder()->first()->id,
        ];
    }
}
