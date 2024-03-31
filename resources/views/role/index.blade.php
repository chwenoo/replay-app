@extends('layouts.master')
@section('content')
    <div>
        <h1>Role List</h1>
        <a href="{{route('roles.create')}}" class="btn btn-primary">new Role</a>
        <table class="table table-striped table-success mt-3">
            <thead>
            <tr>

                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Permissions</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <th scope="row">{{$role->id}}</th>
                        <td>{{$role->name}}</td>
                        <td>
                            @foreach ($role->permissions as $permission)
                                <span class="bg-warning rounded p-1 text-black">{{$permission->name}}</span>
                            @endforeach
                        </td>
                        <td>
                            <div class="btn-group">
                                <div class="me-1">
                                    <a href="{{route('roles.edit', $role->id)}}" class="btn-success btn btn-sm">Edit</a>
                                </div>
                                <form action="{{route('roles.destroy', $role->id)}}" method="POST" class="form">
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
