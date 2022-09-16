<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Round extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function tournamentRounds(){
        return $this->belongsTo(Tournament::class);
    }
    public static function createRound($id){
        $q = DB::table('rounds')
            ->where('tournament_id', $id)
            ->orderBy('round_number','DESC')
            ->value('round_number');

        $number = $q == null ? 1 : $q+1;

        $round = new Round();
        $round->round_number = $number;
        $round->tournament_id = $id;
        $round->save();
        return Game::matches($id, $round->id);
    }
    public static function allRounds($id){
        $q = DB::table('rounds')
            ->where('tournament_id', $id)
            ->orderBy('round_number')
            ->get();
        return $q;
    }





}
