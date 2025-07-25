<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

// ----------------------
// Vistas públicas
// ----------------------

// Vista 1: Splash
Route::get('/', function () {
    return view('splash');
})->name('splash');

// Vista 2: Acceso (Iniciar sesión o Registro)
Route::get('/acceso', function () {
    return view('acceso');
})->name('acceso');

// Vista 3: Registro – Paso 1 (Nombre, Apellidos, Fecha Nac.)
Route::get('/registro/paso1', function () {
    return view('registro1');
})->name('registro.paso1');

// Vista 4: Registro – Paso 2 (Usuario, Contraseña)
Route::get('/registro/paso2', function () {
    return view('registro2');
})->name('registro.paso2');

// Vista 5: Registro – Paso 3 (Tipo de usuario)
Route::get('/registro/paso3', function () {
    return view('registro3');
})->name('registro.paso3');

// Vista de Login
Route::get('/login', function () {
    return view('login');
})->name('login');


// ----------------------
// Procesamiento de formularios
// ----------------------

// POST: Guardar datos paso 1
Route::post('/registro/paso1', function (Request $request) {
    $request->validate([
        'nombre' => 'required|string|min:3',
        'apellidos' => 'required|string|min:3',
        'fecha_nacimiento' => 'required|date',
    ]);

    session(['datos_registro' => [
        'nombre' => $request->nombre,
        'apellidos' => $request->apellidos,
        'fecha_nacimiento' => $request->fecha_nacimiento,
    ]]);

    return redirect()->route('registro.paso2');
})->name('registro.guardar.paso1');

// POST: Guardar datos paso 2 (usuario y contraseña)
Route::post('/registro/paso2', [AuthController::class, 'guardarPaso2'])->name('registro.guardar.paso2');

// POST: Finalizar registro (guardar en base de datos)
Route::post('/registro/finalizar', [AuthController::class, 'finalizarRegistro'])->name('registro.finalizar');

// POST: Procesar inicio de sesión
Route::post('/login', [AuthController::class, 'autenticar'])->name('login.autenticar');


// ----------------------
// Vistas protegidas
// ----------------------

Route::get('/menu/cuidador', function () {
    return view('cuidador.menu');
})->name('menu.cuidador');

Route::get('/menu/consultante', function () {
    return view('consultante.menu');
})->name('menu.consultante');


// ----------------------
// Cerrar sesión
// ----------------------

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');


// ----------------------
// Rutas temporales opcionales
// ----------------------

Route::get('/registro/cuidador', function () {
    return 'Vista para registrar cuidador'; // Temporal
})->name('registro.cuidador');

Route::get('/registro/consultante', function () {
    return 'Vista para registrar consultante'; // Temporal
})->name('registro.consultante');

Route::get('/ajustes', function () {
    return view('ajustes');
})->name('ajustes');
