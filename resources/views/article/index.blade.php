<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Article List</h1>
        <a href="{{route('articles.create')}}" class="btn btn-primary">new Article</a>
        <ul class="list-group mt-3">
            @foreach ($articles as $article)
                <div class="card mb-2">
                    <div class="card-body">
                        <h3>{{$article->title}}</h3>
                        <span>slug : {{$article->slug}}</span>
                        <p>{{$article->context}}</p>
                        <p>excerpt : {{$article->excerpt}}</p>

                        <div class="btn-group float-end">
                            <div class="me-1">
                                <a href="{{route('articles.edit', $article->id)}}" class="btn-success btn btn-sm">Edit</a>
                            </div>
                            <form action="{{route('articles.destroy', $article->id)}}" method="POST" class="form">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>
</body>
</html>
