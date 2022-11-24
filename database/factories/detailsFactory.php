<?php

namespace Database\Factories;

use App\Models\inventories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class detailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'status'=> $this->faker->name(),
            'actual_amount'=>$this->faker->randomDigit(10),
            'inventory_id'=> inventories::InRandomOrder()->first()->id,
        ];
    }
}
