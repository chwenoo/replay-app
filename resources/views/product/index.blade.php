@extends('layouts.master')
@section('content')
    <div>
        <h1>Product List</h1>
        <a href="{{route('products.create')}}" class="btn btn-primary">new Product</a>
        <table class="table table-striped table-success mt-3">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->status}}</td>
                        <td>
                            <img src="{{asset('uploadedImages/'.$product->image)}}" alt="foto" width="100">
                        </td>
                        <td>{{$product->price}}</td>
                        <td>
                            <div class="btn-group">
                                <div class="me-1">
                                    <a href="{{route('products.edit', $product->id)}}" class="btn-success btn btn-sm">Edit</a>
                                </div>
                                <form action="{{route('products.destroy', $product->id)}}" method="POST" class="form">
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
