<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    // Paso 1: guardar datos personales
    public function guardarPaso1(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
        ]);

        session([
            'registro.nombre' => $request->nombre,
            'registro.apellidos' => $request->apellidos,
            'registro.fecha_nacimiento' => $request->fecha_nacimiento,
        ]);

        return redirect()->route('registro.paso2');
    }

    // Paso 2: guardar datos de acceso
    public function guardarPaso2(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string|max:50|unique:users,usuario',
            'password' => 'required|string|min:6|confirmed',
        ]);

        session([
            'registro.usuario' => $request->usuario,
            'registro.password' => Hash::make($request->password),
        ]);

        return redirect()->route('registro.paso3');
    }

    // Paso 3: guardar tipo de usuario y registrar en BD
    public function finalizarRegistro(Request $request)
    {
        $request->validate([
            'tipo_usuario' => 'required|in:cuidador,consultante',
        ]);

        $data = session('registro');

        if (!$data || !isset($data['usuario'], $data['password'])) {
            return redirect()->route('registro.paso1')->with('error', 'Sesión expirada. Vuelve a comenzar.');
        }

        try {
            User::create([
                'nombre' => $data['nombre'],
                'apellidos' => $data['apellidos'],
                'fecha_nacimiento' => $data['fecha_nacimiento'],
                'usuario' => $data['usuario'],
                'password' => $data['password'],
                'tipo_usuario' => $request->tipo_usuario,
            ]);

            session()->forget('registro');

            return redirect()->route('login')->with('success', '✅ Cuenta creada con éxito. ¡Ahora puedes iniciar sesión!');
        } catch (\Exception $e) {
            return redirect()->route('registro.paso1')->with('error', 'Ocurrió un error. Intenta nuevamente.');
        }
    }
}
