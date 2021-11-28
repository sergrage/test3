<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тестовое задание Laravel</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <style>
        .active {
            color: red;
        }

    </style>
</head>
<body>
    <div id="app" class="container">

        <header class="pb-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Тестовое задание</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="/">Главная</a>
                            <a class="nav-link {{ request()->is('test4') ? 'active' : '' }}" href="{{route('test4')}}">Задачки по SQL</a>
                            <a class="nav-link {{ request()->is('test5') ? 'active' : '' }}" href="{{route('test5')}}">Задача по HTML-CSS-JS</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        @yield('content')

    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
    <script>
        function open() {
            console.log(123);
        }
    </script>
</body>
</html>
