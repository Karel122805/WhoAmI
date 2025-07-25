<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Paso 3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Flecha redonda para regresar -->
    <a href="{{ route('registro.paso2') }}" class="btn-flecha" title="Volver">
        <span class="icono-flecha">←</span>
    </a>

    <div class="splash-container">
        <!-- Logo -->
        <img src="{{ asset('img/logo-cerebro.png') }}" alt="Logo Who Am I" class="logo">

        <!-- Título -->
        <h2 class="titulo-seccion">Regístrate</h2>
        <p class="subtitulo">Selecciona un tipo de usuario</p>

        <!-- Botones para tipo de usuario -->
        <div class="botones-usuario">
            <form action="{{ route('registro.finalizar') }}" method="POST">
                @csrf
                <input type="hidden" name="tipo_usuario" value="cuidador">
                <button class="btn-cuidador" type="submit">Cuidador</button>
            </form>

            <div class="separador">O</div>

            <form action="{{ route('registro.finalizar') }}" method="POST">
                @csrf
                <input type="hidden" name="tipo_usuario" value="consultante">
                <button class="btn-consultante" type="submit">Consultante</button>
            </form>
        </div>
    </div>
</body>
</html>
