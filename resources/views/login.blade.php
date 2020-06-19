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
            <h1 class="text-center">Login</h1>
            <form method="POST" action="{{ route('user.login') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input name="avatar" type="file" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
