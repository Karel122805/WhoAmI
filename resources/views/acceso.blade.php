<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comencemos – Who Am I</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Flecha de regreso -->
    <a href="{{ route('splash') }}" class="btn-flecha" title="Volver">
        <span class="icono-flecha">←</span>
    </a>

    <div class="splash-container">
        <!-- Título -->
        <h2 class="titulo-seccion">Comencemos</h2>

        <!-- Logo -->
        <img src="{{ asset('img/logo-cerebro.png') }}" alt="Logo Who Am I" class="logo">

        <!-- Botones -->
        <div class="botones-usuario">
            <a href="{{ route('login') }}" class="btn-cuidador">Iniciar sesión</a>
            <a href="{{ route('registro.paso1') }}" class="btn-consultante">Regístrate</a>
        </div>
    </div>
</body>
</html>
