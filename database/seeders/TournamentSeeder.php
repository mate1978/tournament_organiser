<?php

namespace Database\Seeders;

use App\Models\Participant;
use App\Models\Round;
use App\Models\Tournament;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        Tournament::factory()
            ->count(100)
            ->has(Participant::factory()->count(20), 'tournamentParticipants')
            ->has(Round::factory()->count(4), 'tournamentRounds')
            ->create();
    }
}
