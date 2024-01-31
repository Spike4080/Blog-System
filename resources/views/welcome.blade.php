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
        @foreach($blogs as $fileObj)
        <div class="blog-card">
            <h1>{{$fileObj->title}}</h1>
            <a href="blogs/{{$fileObj->slug}}">
                {{$fileObj->slug}}
            </a>
            <p>{{$fileObj->body}}</p>
        </div>
        @endforeach
    </div>
</body>

</html>