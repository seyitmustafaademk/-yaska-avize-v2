<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailSource>
 */
class DetailSourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_detail_id' => 1,
            'alt_text' => $this->faker->text(50),
            'source_url' => $this->faker->unique()->imageUrl(1000, 1000,  null, true, 'Product'),
            'source_type' => 'image',
        ];
    }
}
