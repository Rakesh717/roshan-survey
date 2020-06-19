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
        body {
            font-family: 'Nunito';
            width: 100vw !important;
            overflow: hidden;
        }

        img {
            width: 100%;
            object-fit: cover;
            height: 100vh;
        }
    </style>
</head>

<body>
    <main class="row">
        <div class="col-md-6">
            <img src="https://images.pexels.com/photos/583846/pexels-photo-583846.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                alt="">
        </div>
        <div class="col-md-6 my-5">
            <h1 class="text-center">Login</h1>
            <form method="POST" action="{{ route('user.login') }}" class="mt-5" enctype="multipart/form-data">
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
    </main>
</body>

</html>
