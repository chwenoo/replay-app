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
    <div class="container mt-5">
        <h1 class="text-center">Create Article</h1>
        <form action="{{route('articles.store')}}" method="post" class="form" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <input type="text" name="title" class="form-control" placeholder="title ...">
                @if ($errors->first('title'))
                    <p class="text-danger">{{$errors->first('title')}}</p>
                @endif

            </div>
            <div class="mb-2">
                <input type="text" name="slug" class="form-control" placeholder="slug ...">
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
                <textarea name="context" id="" cols="30" rows="5" class="form-control" placeholder="context ..."></textarea>
                @if ($errors->first('context'))
                    <p class="text-danger">{{$errors->first('context')}}</p>
                @endif
            </div>
            <div class="mb-3">
                <input type="text" name="excerpt" class="form-control" placeholder="excerpt ...">
                @if ($errors->first('excerpt'))
                    <p class="text-danger">{{$errors->first('excerpt')}}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary w-100">create</button>
        </form>
    </div>
</body>
</html>
