<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Paso 2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Flecha para volver -->
    <a href="{{ route('registro.paso1') }}" class="btn-flecha" title="Volver">
        <span class="icono-flecha">←</span>
    </a>

    <div class="splash-container">
        <!-- Logo -->
        <img src="{{ asset('img/logo-cerebro.png') }}" alt="Logo Who Am I" class="logo">

        <!-- Título -->
        <h2 class="titulo-seccion">Regístrate</h2>

        <!-- Mostrar errores del backend -->
        @if($errors->any())
            <div class="mensaje-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario -->
        <form action="{{ route('registro.guardar.paso2') }}" method="POST" class="formulario-registro">
            @csrf

            <label for="usuario">Crea un usuario</label>
            <input type="text" name="usuario" id="usuario" value="{{ old('usuario') }}" required>

            <label for="password">Crea una contraseña</label>
            <input type="password" name="password" id="password" required>
            <small class="mensaje-info">Debe tener mínimo 8 caracteres, incluir letras y números.</small>

            <label for="password_confirmation">Confirma tu contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>

            <button type="submit" class="btn-principal">Siguiente</button>
        </form>
    </div>
</body>
</html>
