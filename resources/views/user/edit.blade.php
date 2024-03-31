@extends('layouts.master')
@section('content')
<div style="max-width: 500px; margin: auto">
    <h1 class="text-center">Update User</h1>
    <form action="{{route('users.update', $user->id)}}" method="POST" class="form">
        @csrf
        @method('PATCH')
        <div class="mb-2">
            <input type="text" name="name" class="form-control" placeholder="user name ..." value="{{$user->name}}">
            @if ($errors->first('name'))
                <p class="text-danger">{{$errors->first('name')}}</p>
            @endif
        </div>
        <div class="mb-2">
            <input type="email" name="email" class="form-control" placeholder="user email ..." value="{{$user->email}}">
            @if ($errors->first('email'))
                <p class="text-danger">{{$errors->first('email')}}</p>
            @endif
        </div>
        <div class="mb-2">
            <select name="role" class="form-select">
                @foreach ($roles as $role)
                    <option value="{{$role->name}}" @if ($role->name === $user->roles[0]['name'])
                        selected
                    @endif>{{$role->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <input type="password" name="password" class="form-control" placeholder="Update password ...">
            @if ($errors->first('password'))
                <p class="text-danger">{{$errors->first('password')}}</p>
            @endif
        </div>
        <div class="mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="confirmed password ...">
            @if ($errors->first('password_confirmation'))
                <p class="text-danger">{{$errors->first('password_confirmation')}}</p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary w-100">create</button>
    </form>
</div>
@endsection
