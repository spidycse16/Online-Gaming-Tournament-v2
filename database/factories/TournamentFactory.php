<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tournament>
 */
class TournamentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tournament_name' => $this->faker->words(5, true), // Generates a 5-word tournament name
            'match_fee' => $this->faker->randomElement([10, 20, 100]), // Random match fee (numeric)
            'date_time' => $this->faker->dateTimeBetween('now', '+1 year'), // Random future date and time
            'game_name' => $this->faker->randomElement(['Clash of Clans', 'Clash Royale', 'Pubg', 'FIFA']), // Random game name
            'player_number' => $this->faker->randomElement([8, 16]), // Randomly selects either 8 or 16
            'winning_amount' => $this->faker->numberBetween(50, 100), // Random winning amount between 50 and 100
            'image' => $this->faker->imageUrl(640, 480, 'sports', true, 'tournament'), // Generates a random sports image URL
            'players_joined' => $this->faker->numberBetween(16, 32), // Random number of players joined between 16 and 32
            'description' => $this->faker->sentence(10), // Generates a 10-word sentence as a description
        ];
    }
}
