<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ajustes – Who Am I</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <!-- Botón para volver -->
    <a href="{{ url()->previous() }}" class="btn-flecha" title="Volver">
        <span class="icono-flecha">←</span>
    </a>

    <div class="splash-container">
        <!-- Título -->
        <h2 class="titulo-seccion">Ajustes</h2>

        <!-- Logo -->
        <img src="{{ asset('img/logo-cerebro.png') }}" alt="Logo Who Am I" class="logo">

        <p class="subtitulo">Gestiona tu cuenta</p>

        <!-- Opciones de ajustes -->
        <div class="ajustes-opciones botones-usuario">
            <a href="#" class="btn-perfil">
                <i data-lucide="user-cog"></i> Perfil
            </a>
            <a href="{{ route('logout') }}" class="btn-logout">
                <i data-lucide="log-out"></i> Cerrar sesión
            </a>

        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
