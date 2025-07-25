<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú del Cuidador – Who Am I</title>
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
        <h2 class="titulo-seccion">Bienvenido Cuidador</h2>

        <!-- Logo -->
        <img src="{{ asset('img/logo-cerebro.png') }}" alt="Logo Who Am I" class="logo">

        <p class="subtitulo">Selecciona una opción</p>

        <!-- Menú de opciones -->
        <div class="botones-usuario">
            <a href="#" class="btn-cuidador">
                <i data-lucide="users"></i> Ver Pacientes
            </a>
            <a href="#" class="btn-cuidador">
                <i data-lucide="user-plus"></i> Registrar Paciente
            </a>
            <a href="#" class="btn-cuidador">
                <i data-lucide="book-open-text"></i> Guías Rápidas
            </a>
            <a href="#" class="btn-cuidador">
                <i data-lucide="calendar"></i> Calendario de Recuerdos
            </a>
            <a href="#" class="btn-cuidador">
                <i data-lucide="message-circle"></i> ChatWhoAmI
            </a>
            <a href="#" class="btn-cuidador">
                <i data-lucide="bell"></i> Notificaciones
            </a>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
