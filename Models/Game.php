<?php

namespace App\Models;

use App\Http\Controllers\GameController;
use App\Http\Controllers\TournamentController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Game extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function roundGames(){
        return $this->belongsTo(Round::class);
    }
    public function GameParticipants(){
        return $this->hasOne(User::class)->where('participants_id1')->where('participants_id2');
    }
    public static function show($id){
        $q = DB::table('games')
            ->where('id',$id)
            ->get();

        return $q;
    }
    public static function matches($tournament_id,$round_id){
        $q = DB::table('participants')
            ->where('id', '=', $tournament_id)
            ->orderBy('points')
            ->orderBy('lucky_number')
            ->get()->toArray();

        if(count($q)%2 == 1){
            array_push($q, 'BYE');
        }
        for ($i=0;$i <count($q)-2; $i=$i+2){
            $game = new Game();
            $game->tournament_id = $tournament_id;
            $game->round_id = $round_id;
            $game->winner = null;
            $game->user_id1 = $q[$i];
            $game->user_id2 = $q[$i+1];

            $game->save();
        }
        return redirect()->action([TournamentController::class,'index']);
    }


}
