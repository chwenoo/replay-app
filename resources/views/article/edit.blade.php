@extends('layouts.master')
@section('content')
    <div class="" style="max-width: 500px; margin:auto">
        <h1 class="text-center">Update Article</h1>
        <form action="{{route('articles.update', $article->id)}}" method="post" class="form" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-2">
                <input type="text" name="title" class="form-control" placeholder="title ..." value="{{$article->title}}">
                @if ($errors->first('title'))
                    <p class="text-danger">{{$errors->first('title')}}</p>
                @endif
            </div>
            <div class="mb-2">
                <input type="text" name="slug" class="form-control" placeholder="slug ..." value="{{$article->slug}}">
                @if ($errors->first('slug'))
                    <p class="text-danger">{{$errors->first('slug')}}</p>
                @endif
            </div>
            <div class="mb-3">
                <input type="file" name="images[]" multiple class="form-control">
                @if ($errors->first('images'))
                    <p class="text-danger">{{$errors->first('images')}}</p>
                @endif
            </div>
            <div class="mb-2">
                <textarea name="context" id="" cols="30" rows="5" class="form-control" placeholder="context ...">{{$article->context}}</textarea>
                @if ($errors->first('context'))
                    <p class="text-danger">{{$errors->first('context')}}</p>
                @endif
            </div>
            <div class="mb-3">
                <input type="text" name="excerpt" class="form-control" placeholder="excerpt ..." value="{{$article->excerpt}}">
                @if ($errors->first('excerpt'))
                    <p class="text-danger">{{$errors->first('excerpt')}}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary w-100">update</button>
        </form>
    </div>
@endsection
