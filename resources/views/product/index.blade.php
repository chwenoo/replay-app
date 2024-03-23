<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <h1>Product List</h1>
        <a href="{{route('products.create')}}" class="btn btn-primary">new Product</a>
        <ul class="list-group mt-3">
            @foreach ($products as $product)
                <li class="list-group-item">

                    ({{$product->id}})  <span>{{$product->name}}</span>
                    <div class="btn-group float-end">
                        <div class="me-1">
                            <a href="{{route('products.edit', $product->id)}}" class="btn-success btn btn-sm">Edit</a>
                        </div>
                        <form action="{{route('products.delete', $product->id)}}" method="POST" class="form">
                            @csrf
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
