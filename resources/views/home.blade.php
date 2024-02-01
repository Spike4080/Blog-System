<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Show Page</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="container">
        <h1>{{$title}}</h1>
        @foreach($blogs as $blog)
        <div class="blog-card">
            <h1>{{$blog->title}}</h1>
            <a href="{{$blog->slug}}">
                {{$blog->slug}}
            </a>
            <p>{{$blog->intro}}</p>
            <p>
                Category -
                <a href="/categories/{{$blog->category->id}}">
                    {{$blog->category->name}}
                </a>
            </p>
            <p>
                {{$blog->category->id}}
            </p>
        </div>
        @endforeach
    </div>
</body>

</html>