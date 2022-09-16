
@extends('layouts.layout')

@section('content')


    <table class="table table-striped table-dark table-hover">
        <thead>
        <tr>
            <th scope="col">Number</th>
            <th scope="col">Name</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($data ?? [] as $row)
            <tr scope="row"> </tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td><form action="{{ route('participants.destroy',$row->id) }}" method="Post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        @empty
            <tr scope="row" ></tr>
            <td>There is no participant or we have a problem with database connection:(</td>
        @endforelse

        </tbody>
    </table>


@endsection
