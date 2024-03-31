@extends('layouts.master')
@section('content')
    <div>
        <h1>User List</h1>
        @can('user_create')
            <a href="{{route('users.create')}}" class="btn btn-primary">new User</a>
        @endcan
        <table class="table table-striped table-success mt-3">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">
                    @can('user_create')
                        Action
                    @endcan
                </th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                <span class="bg-warning rounded p-1">{{$role->name}}</span>
                            @endforeach
                        </td>
                        <td>
                            <div class="btn-group">
                                @can('user_edit')
                                    <div class="me-1">
                                        <a href="{{route('users.edit', $user->id)}}" class="btn-success btn btn-sm">Edit</a>
                                    </div>
                                @endcan
                                @can('user_delete')
                                    <form action="{{route('users.destroy', $user->id)}}" method="POST" class="form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
