<?php

namespace Database\Factories;

use App\Models\Participant;
use App\Models\Round;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            $id = 'tournament_id'=>$this->faker->numberBetween(1,Tournament::class::count()),
            'participant_id1'=>$this->faker->numberBetween(1,Participant::class::GetNumberOfParticipant($id)),
            'participant_id2'=>$this->faker->numberBetween(1,Participant::class::GetNumberOfParticipant($id)),
            'round_id'=>$this->faker->numberBetween(1,Round::class::count()),
            'winner'=>null,
        ];
    }
}
