<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <style>
        .container {
            max-width: 500px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Product</h1>
        <form action="{{route('products.store')}}" method="post" class="form">
            @csrf
            <div class="mb-2">
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-2">
                <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="mb-2">
                <select name="status" id="" class="form-select">
                    <option value="0">false</option>
                    <option value="1">true</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" name="price" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w-100">create</button>
        </form>
    </div>
</body>
</html>
