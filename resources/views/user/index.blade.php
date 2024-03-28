@extends('layouts.master')
@section('content')
    <div>
        <h1>User List</h1>
        <a href="{{route('users.create')}}" class="btn btn-primary">new User</a>
        <table class="table table-striped table-success mt-3">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <div class="btn-group">
                                <div class="me-1">
                                    <a href="{{route('users.edit', $user->id)}}" class="btn-success btn btn-sm">Edit</a>
                                </div>
                                <form action="{{route('users.destroy', $user->id)}}" method="POST" class="form">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
