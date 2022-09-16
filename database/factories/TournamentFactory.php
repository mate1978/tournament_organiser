<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Tournament;
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
    public function definition()
    {
        return [
            'event_name' =>$this->faker->paragraph(1),
            'max_participant' =>$this->faker->numberBetween(10,200),
            'number_participant' => 0,
            'date' =>$this->faker->dateTimeBetween('now','+5 years'),
            'address_id'=>$this->faker->numberBetween(1,(Address::class::count())),
        ];
    }
}
