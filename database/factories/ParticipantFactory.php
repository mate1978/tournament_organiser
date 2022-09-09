<?php

namespace Database\Factories;

use App\Models\Tournament;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Participant>
 */
class ParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tournament_id'=>$this->faker->numberBetween(1,Tournament::class::count()),
            'user_id'=>$this->faker->numberBetween(1,User::class::count()),
            'points' =>$this->faker->numberBetween(0,12),
            'lucky_number' =>$this->faker->numberBetween(0,999),

        ];
    }
}
