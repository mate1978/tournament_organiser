
@extends('layouts.layout')

@section('content')


    <table class="table table-striped table-dark table-hover">
        <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($users ?? [] as $user)
            <tr scope="row"> </tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>

            <td>{{$user->email}}

            <td><a href="{{route('tournament.show',$user->id)}}"><button class="btn btn-warning">Orders</button></a><td>
            <td> <a href="{{route('users.edit',$user->id)}}"><button class="btn btn-primary">Update</button></a></td>
            <td><form action="{{ route('users.destroy',$user->id) }}" method="Post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        @empty
            <tr scope="row" ></tr>
            <td>No User or we have a problem with database connection:(</td>
        @endforelse

        </tbody>
    </table>


@endsection
