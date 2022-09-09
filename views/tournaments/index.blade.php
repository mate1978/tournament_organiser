
@extends('layouts.layout')

@section('content')


    <table class="table table-striped table-dark table-hover">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">Max participant</th>
            <th scope="col">#Participant</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($data ?? [] as $row)
            <tr scope="row"> </tr>
            <td>{{$row->id}}</td>
            <td>{{$row->date}}</td>
            <td>{{\App\Models\Participant::class::GetNumberOfParticipant($row->id)}}</td>
            <td>{{$row->max_participant}}</td>
            <td>{{\App\Models\Address::class::getAddress($row->address_id)}}
            </td>

            <td><a href="{{route('participants.show',$row->id)}}"><button class="btn btn-warning">
                        {{\App\Models\Participant::class::GetNumberOfParticipant($row->id)}}
                    </button></a><td>
            <td> <a href="{{route('tournaments.edit',$row->id)}}"><button class="btn btn-primary">Update</button></a></td>
            <td><form action="{{ route('tournaments.destroy',$row->id) }}" method="Post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        @empty
            <tr scope="row" ></tr>
            <td>No Tournament or we have a problem with database connection:(</td>
        @endforelse

        </tbody>
    </table>


@endsection
