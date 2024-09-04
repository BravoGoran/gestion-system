<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .navbar {
            background-color: #343a40;
            color: #ffffff;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
            font-weight: bold;
        }

        .navbar-nav .nav-link:hover {
            color: #ffffff;
            opacity: 0.8;
        }

        .btn {
            padding: 8px 20px;
            margin-right: 10px;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 8px;
            text-align: left;
            border: 1px solid #dee2e6;
        }

        .table th {
            background-color: #343a40;
            color: #ffffff;
            font-weight: bold;
        }

        .table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .table tr:hover {
            background-color: #e9ecef;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            font-size: 1rem;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group p {
            margin: 8px 0;
        }

        /* Estilos específicos para la plantilla */
        .header {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px 20px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    @include('navegacion')
    <div class="container">
        <h1>@yield('titulo')</h1>
        <div class="content">
            @yield('contenido')
        </div>
    </div>
</body>

</html>
