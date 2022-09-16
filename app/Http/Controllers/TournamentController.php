<?php

namespace App\Http\Controllers;

use App\Models\Round;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\AuthorCollectionIterator;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tournaments.index',['data'=>Tournament::class::getAll()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('tournaments.details', ['participants'=>Tournament::class::details($id), 'rounds' => Round::class::allRounds($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('tournaments.edit', ['tournament'=> Tournament::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public static function showFinished(){
        return view('public.tournaments',['list' => Tournament::class::showFinished()]);
    }
    public static function showNotFinished(){
        if (Auth::user() != null){
            $user = Auth::user();
            return view('private.tournaments',['list' => Tournament::class::showNotFinished(), 'user'=>$user]);
        }
        return view('public.tournaments',['list' => Tournament::class::showNotFinished()]);
    }


}
