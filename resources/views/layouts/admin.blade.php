<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard Template · Bootstrap</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        body {
            font-family: 'Nunito';
        }

        img {
            object-fit: contain;
            height: 150px;
            width: 150px;
        }
    </style>
</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal"><a href="{{ url('admin') }}">Roshan Survey</a></h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="{{ route('admin.users.index') }}">Users</a>
            <a class="p-2 text-dark" href="{{ route('admin.questions.index') }}">Questions</a>
            <a class="p-2 text-dark" href="{{ route('admin.surveys.index') }}">Surveys</a>
        </nav>
        <a class="btn btn-outline-primary" href="{{ route('admin.logout') }}">Log Out</a>
    </div>
    <div class="container-fluid">
        @yield('content')
    </div>
    @yield('scripts')
</body>

</html>
