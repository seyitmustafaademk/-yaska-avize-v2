<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductDetail>
 */
class ProductDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => 1,
            'measurement' => $this->faker->numberBetween(10, 500),
            'weight' => $this->faker->numberBetween(10, 500),
            'quantity' => $this->faker->numberBetween(10, 500),
            'list_price' => $this->faker->numberBetween(200, 20000),
        ];
    }
}
