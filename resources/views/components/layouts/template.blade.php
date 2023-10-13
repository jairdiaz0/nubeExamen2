<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if ($bootstrap)
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    @endif
    @if ($globalCSS)
        <!-- Global -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endif

    <title>Examen WEB - {{ $title }} </title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">EJSD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link @if (request()->routeIs('genres.index')) active @endif" aria-current="page" href="{{ route('genres.index') }}">Generos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (request()->routeIs('ratings.index')) active @endif" href="{{ route('ratings.index') }}">Clasificaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (request()->routeIs('movies.index')) active @endif" href="{{ route('movies.index') }}">Peliculas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        {{ $slot }}
    </div>
    @if ($jquerie)
        <!-- JQuerie -->
        <script src="{{ asset('js/jquery.js') }}"></script>
    @endif
</body>

</html>
