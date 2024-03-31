@extends('layouts.master')
@section('content')
<div style="max-width: 500px; margin: auto">
    <h1 class="text-center">Create Role</h1>
    <form action="{{route('roles.store')}}" method="POST" class="form">
        @csrf
        <div class="mb-2">
            <input type="text" name="name" class="form-control" placeholder="Role Name ...">
            @if ($errors->first('name'))
                <p class="text-danger">{{$errors->first('name')}}</p>
            @endif
        </div>
        <div class="mb-2">
            <select name="permissions[]" multiple class="form-select">
                @foreach ($permissions as $permission)
                    <option value="{{$permission->id}}">{{$permission->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">create</button>
    </form>
</div>
@endsection
