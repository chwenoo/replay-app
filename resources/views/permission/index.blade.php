@extends('layouts.master')
@section('content')
    <div>
        <h1>Permission List</h1>
        <a href="{{route('permissions.create')}}" class="btn btn-primary">new Permission</a>
        <table class="table table-striped table-success mt-3">
            <thead>
            <tr>

                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <th scope="row">{{$permission->id}}</th>
                        <td>{{$permission->name}}</td>
                        <td>
                            <div class="btn-group">
                                <div class="me-1">
                                    <a href="{{route('permissions.edit', $permission->id)}}" class="btn-success btn btn-sm">Edit</a>
                                </div>
                                <form action="{{route('permissions.destroy', $permission->id)}}" method="POST" class="form">
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
