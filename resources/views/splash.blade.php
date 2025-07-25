<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Who Am I</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="splash-container">
        <img src="{{ asset('img/logo-cerebro.png') }}" alt="Logo Who Am I" class="logo">
        <div class="bienvenido">BIENVENIDO A</div>
        <div class="nombre-app">who am i?</div>
        <form action="{{ route('acceso') }}" method="GET">
            <button class="btn-principal" type="submit">Comenzar</button>
        </form>
    </div>
</body>
</html>
