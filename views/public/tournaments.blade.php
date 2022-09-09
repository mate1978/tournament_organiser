@extends('public.layout')

@section('content')

    <table class="table table-striped table-dark table-hover">
        <thead>
        <tr>
            <th scope="col">Name of event</th>
            <th scope="col">Location</th>
            <th scope="col">Date</th>
            <th scope="col">Number of participant</th>
            <th scope="col">Max participant</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse($list[0] ?? [] as $row)
            <tr scope="row"> </tr>
            <td></td>
            <td>{{\App\Models\Address::getAddress($row->address_id)}}</td>
            <td>{{$row->date}}</td>
            <td>{{\App\Models\Participant::class::GetNumberOfParticipant($row->id)}}</td>
            <td>{{$row->max_participant}}</td>
            <td><a href="{{route('tournaments.show',$row->id)}}"><button class="btn btn-warning"> Details</button></a></td>


        @empty
            <td colspan="5">Unfortunetly there is no compatition</td>

        @endforelse

        </tbody>
    </table>

@endsection

