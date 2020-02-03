<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Alonso Engenharia</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <ul>
            <li class="menu"><a href="/cliente/">Cadastro de cliente</a></li>
            <li class="menu"><a href="/cliente/listar">Listar / Editar Cliente</a></li>
            <li class="menu"><a>Nova Proposta</a></li>
            <li class="menu"><a>lista de proprosta</a></li>
            <li class="menu"><a>Cadastro de usuários</a></li>
        </ul>
    </header>
    <main class="py-4">
        @yield('main')
    </main>
</body>