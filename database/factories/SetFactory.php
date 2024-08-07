<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Set>
 */
class SetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'game_id' => 1,
            'set_index' => fake() -> numberBetween(0,5),
            'our_points' => fake() -> numberBetween(0,50),
            'opponent_points' => fake() -> numberBetween(0,50),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
