<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión – Who Am I</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Botón de regreso (ícono circular negro con flecha) -->
    <a href="{{ route('acceso') }}" class="btn-flecha" title="Volver">
        <span class="icono-flecha">←</span>
    </a>

    <div class="splash-container">

        <!-- Título -->
        <h2 class="titulo-seccion">Iniciar sesión</h2>

        <!-- Logo -->
        <img src="{{ asset('img/logo-cerebro.png') }}" alt="Logo Who Am I" class="logo">

        <!-- MENSAJES -->
        @if(session('success'))
            <div class="mensaje-exito">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="mensaje-error">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="mensaje-error">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <!-- FORMULARIO -->
        <form action="{{ route('login.autenticar') }}" method="POST" class="formulario-registro">
            @csrf

            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" required>

            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" required>

            <button type="submit" class="btn-cuidador">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>
