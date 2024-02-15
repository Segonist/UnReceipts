<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    protected $model = Purchase::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user' => fake()->numberBetween(1, 5),
            'name' => fake()->word,
            'price' => fake()->randomFloat(2, 0, 1000),
            'category' => fake()->word,
            'created_at' => fake()->dateTimeThisMonth()
        ];
    }
}
