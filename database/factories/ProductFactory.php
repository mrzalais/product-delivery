<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'size' => $this->faker->name,
            'amount' => $this->faker->numberBetween(0,10),
            'price' => $this->faker->numberBetween(0,10),
        ];
    }
}
