<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tournament extends Model
{
    use HasFactory;

    public function tournamentParticipants(){
        return $this->hasMany(Participant::class);
    }
    public function tournamentRounds(){
        return $this->hasMany(Round::class);
    }
    public function tournamentAddres(){
        return $this->hasOne(Address::class);
    }
    public static function getAll(){
        $q = DB::table('tournaments')
            ->orderBy('date')
            ->get();
        return $q;
    }
    public static function showFinished(){
        $date = date("Y-m-d");
        $list[] = DB::table('tournaments')
            ->where('date', '<', $date)
            ->orderBy('date')
            ->get();

        return $list;
    }
    public static function showNotFinished(){
        $date = date("Y-m-d");
        $list[] = DB::table('tournaments')
            ->where('date', '>', $date)
            ->orderBy('date')
            ->get();

        return $list;
    }
    public static function details($id){
        $data = DB::table('participants')
            ->where('tournament_id',$id)
            ->leftJoin('users', 'user_id', '=', 'users.id')
            ->select('users.name', 'tournament_id', 'points')
            ->orderBy('points', 'DESC')
            ->get();

        return $data = json_decode($data, true);
    }
    public static function ParticipantNumber($id){
        $count = Participant::where('tournament_id',$id)->count();
        return $count;
    }


}
