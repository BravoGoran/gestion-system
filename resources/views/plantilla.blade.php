<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('titulo')</title>
</head>

<body>
    @include('navegacion')

    <div class="container mt-5">
        <h1 class="text-center mb-4">@yield('titulo')</h1>
        <div class="content">
            @yield('contenido')
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pLk5Eq4O7lPU9O13uS/MmTfT3z0b0C1GR3TAZrGTRcfAKT0nRGrZK1BQ8Z/Zg0RI" crossorigin="anonymous"></script>
</body>

</html>
