<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тестовое задание Laravel</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="container">
        
        <header>
            <nav class="nav pb-5 pt-5">
              <a class="nav-link active" aria-current="page" href="#">Active</a>
              <a class="nav-link" href="#">Link</a>
              <a class="nav-link" href="#">Link</a>
              <a class="nav-link disabled">Disabled</a>
            </nav>
        </header>

        @yield('content')

    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>