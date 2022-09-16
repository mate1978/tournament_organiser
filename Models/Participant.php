<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Participant extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function tournamentParticipants(){
        return $this->belongsTo(Tournament::class);
    }
    public function ParticipantUsers(){
        return $this->hasMany(User::class);
    }

    public static function GetNumberOfParticipant($id){
        $count = DB::table('participants')
            ->where('tournament_id', $id)
            ->count();

        return (int)$count;
    }
    public static function GetTournamentParticipant($id){
        $q = DB::table('participants')
            ->where('participants.tournament_id', $id)
            ->rightJoin('users', 'participants.user_id', '=', 'users.id')
            ->get();
        return $q;
    }
    public static function drop($id){
        $participant = Participant::findOrFail($id);
        $tournament_id = $participant->tournament_id;
        $participant->delete();
        return view('participants.index', ['data' => $tournament_id]);
    }
    public static function getPoints($id,$tournament_id){
        $win=DB::table('games')
            ->where('tournament_id',$tournament_id)
            ->where('participant_id1', $id)
            ->where('winner', $id)
            ->orWhere('participant_id2', $id)
            ->count();
        $draw=DB::table('games')
            ->where('tournament_id',$tournament_id)
            ->where('participant_id1', $id)
            ->where('winner', $id)
            ->orWhere('participant_id2', $id)
            ->count();

        return $win*3 +$draw;
    }
}
