<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro Paso 1 – Who Am I</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Flecha de regreso a la Vista de Acceso -->
    <a href="{{ route('acceso') }}" class="btn-flecha" title="Volver">
        <span class="icono-flecha">←</span>
    </a>

    <div class="splash-container">
        <!-- Título -->
        <h2 class="titulo-seccion">Regístrate</h2>

        <!-- Logo -->
        <img src="{{ asset('img/logo-cerebro.png') }}" alt="Logo Who Am I" class="logo">

        <!-- Formulario: pasa los datos al controlador -->
        <form action="{{ route('registro.guardar.paso1') }}" method="POST" class="formulario-registro">
            @csrf

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" required>

            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" required>

            <label for="fecha_nacimiento">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>

            <button type="submit" class="btn-principal">Siguiente</button>
        </form>
    </div>
</body>
</html>
