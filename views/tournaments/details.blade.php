@extends('layouts.layout')

@section('content')

    <h1>Participant</h1>
    <ul>
        @for($i=0;$i<count($participants);$i++)
            <li> {{$participants[$i]['name']}} : {{$participants[$i]['points']}} </li>
        @endfor
    </ul>
    <h1>Rounds:</h1>
    <ul style="list-style-type: none;">
        @foreach($rounds as $round)
        <li>
        <a href="#"><button class="btn btn-warning">Round {{$round->round_number}}</button></a>
        </li>
    </ul>
    <a href="{{ route('rounds.create', $parameters = ['tournament_id'=>$participants[0]['tournament_id']] )}}"><button class="btn btn-primary">Create a new round</button></a>
    @endforeach

@endsection
