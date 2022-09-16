<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Address extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function tournamentAddress(){
        return $this->belongsTo(Tournament::class);
    }
    public static function getAddress($id){
        $q = DB::table('addresses')
            ->where('id', $id)
            ->get(['city','street_name', 'house_number']);


        return $q[0]->city." ".$q[0]->street_name." ".$q[0]->house_number;
    }

}
