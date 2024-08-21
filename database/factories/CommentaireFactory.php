<?php

namespace Database\Factories;

use App\Models\Pokemon;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class CommentaireFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'pokemon_id' => Pokemon::inRandomOrder()->first()->id,
            'body' => $this->faker->realTextBetween(20, 400),
            'created_at' => $this->faker->dateTimeBetween('-2 months', 'now'),
        ];
    }
}

