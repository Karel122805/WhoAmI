<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú del Consultante – Who Am I</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <!-- Botón de ajustes -->
    <a href="{{ route('ajustes') }}" class="btn-ajustes" title="Ajustes">
        <i data-lucide="settings"></i>
    </a>

    <div class="splash-container">
        <!-- Bienvenida -->
        <h2 class="titulo-seccion">Bienvenido Consultante</h2>

        <!-- Logo -->
        <img src="{{ asset('img/logo-cerebro.png') }}" alt="Logo Who Am I" class="logo">

        <p class="subtitulo">Selecciona una opción</p>

        <!-- Menú de opciones -->
        <div class="botones-usuario">
            <a href="#" class="btn-consultante">
                <i data-lucide="calendar"></i> Calendario de Recuerdos
            </a>
            <a href="#" class="btn-consultante">
                <i data-lucide="message-circle"></i> ChatWhoAmI
            </a>
            <a href="#" class="btn-consultante">
                <i data-lucide="smile"></i> Frases Motivadoras
            </a>
            <a href="#" class="btn-consultante">
                <i data-lucide="info"></i> Consejos
            </a>
            <a href="#" class="btn-consultante">
                <i data-lucide="alert-triangle"></i> Emergencia
            </a>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
