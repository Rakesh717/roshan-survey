<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Roshan Survey - Login</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        .main {
            display: flex;
            align-content: center;
            height: 100vh;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="main">
        <div style="margin: auto">
            <h1>Admin Login</h1>
            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                @if(session('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
                @enderror
                <div class="form-group">
                    <label for="username">Username</label>
                    <input name="username" type="text" class="form-control" id="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
