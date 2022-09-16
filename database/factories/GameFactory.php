<?php

namespace Database\Factories;

use App\Models\Participant;
use App\Models\Round;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use mysqli_stmt;

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
        $tournament_id = $this->faker->numberBetween(1,Tournament::class::count());
        $participants =  Participant::class::GetTournamentParticipant($tournament_id);
        $user1 = $this->faker->numberBetween(1,Participant::class::GetNumberOfParticipant($tournament_id));
        $user2 = $this->faker->numberBetween(1,Participant::class::GetNumberOfParticipant($tournament_id));
        return [
            'tournament_id'=>$tournament_id,
            'participant_id1'=>$participants[$user1],
            'participant_id2'=>$participants[$user2],
            'round_id'=>$this->faker->numberBetween(1, Round::class::count()),
            'winner'=>  function() use ($user2, $user1) {
              if(random_int(1, 1000)%2==1){
                  return $user1;
              }
              return $user2;
                  }
            ,

        ];
    }
}
