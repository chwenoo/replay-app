@extends('layouts.master')
@section('content')
<div style="max-width: 500px; margin: auto">
    <h1 class="text-center">Create Permission</h1>
    <form action="{{route('permissions.store')}}" method="POST" class="form">
        @csrf
        <div class="mb-2">
            <input type="text" name="name" class="form-control" placeholder="Permission Name ...">
            @if ($errors->first('name'))
                <p class="text-danger">{{$errors->first('name')}}</p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary w-100">create</button>
    </form>
</div>
@endsection
