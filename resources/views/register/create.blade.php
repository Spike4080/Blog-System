<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
</head>

<body>
    <h1>Register Form</h1>
    <form action="" method="POST">
        @csrf
        <div>
            <input type="text" placeholder="Name" name="name" value="{{old('name')}}">

        </div>
        @error('name')
        <p>{{$message}}</p>
        @enderror
        <div>
            <input type="text" placeholder="Username" name="username" value="{{old('username')}}">

        </div>
        @error('username')
        <p>{{$message}}</p>
        @enderror
        <div>
            <input type="email" placeholder="Email" name="email" value="{{old('email')}}">

        </div>
        @error('email')
        <p>{{$message}}</p>
        @enderror
        <div>
            <input type="password" placeholder="Password" name="password">

        </div>
        @error('password')
        <p>{{$message}}</p>
        @enderror
        <button type="submit">Create Account</button>
    </form>
</body>

</html>