@extends('private.layout')

@section('content')


    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    <tbody id="app">
        <td>
        @foreach($list as $game)
        <details-view id="{{$game->id}}"></details-view>
        @endforeach
        </td>
    </tbody>
    </table>
@endsection
