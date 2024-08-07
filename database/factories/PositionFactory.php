<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
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
            'player_id' => 1,
            'initial_position' => fake() -> numberBetween(1,6),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
