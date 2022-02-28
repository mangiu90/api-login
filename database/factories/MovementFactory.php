<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Movement;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movement>
 */
class MovementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'type' => $this->faker->randomElement(Movement::TYPE_OPTIONS),
            'amount' => $this->faker->randomFloat(2, 100, 10000),
            'description' => $this->faker->text(5),
        ];
    }
}
