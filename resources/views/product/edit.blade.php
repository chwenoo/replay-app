@extends('layouts.master')
@section('content')
    <div style="max-width: 500px; margin: auto">
        <h1 class="text-center">Update Product</h1>
        <form action="{{route('products.update', $product->id)}}" method="post" class="form" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-2">
                <input type="text" name="name" class="form-control" value="{{$product->name}}">
                @if ($errors->first('name'))
                    <p class="text-danger">{{$errors->first('name')}}</p>
                @endif
            </div>
            <div class="mb-2">
                <textarea name="description" id="" cols="30" rows="5" class="form-control">{{$product->description}}</textarea>
                @if ($errors->first('description'))
                    <p class="text-danger">{{$errors->first('description')}}</p>
                @endif
            </div>
            <div class="mb-2">
                <select name="status" id="" class="form-select">
                    <option value="0" @if ($product->status === 0) selected @endif>false</option>
                    <option value="1" @if ($product->status === 1) selected @endif>true</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="file" name="image" class="form-control">
                @if ($errors->first('image'))
                    <p class="text-danger">{{$errors->first('image')}}</p>
                @endif
            </div>
            <div class="mb-3">
                <input type="text" name="price" class="form-control" value="{{$product->price}}">
                @if ($errors->first('price'))
                    <p class="text-danger">{{$errors->first('price')}}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary w-100">create</button>
        </form>
    </div>
@endsection
