<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Autenticar al usuario.
     */
    public function autenticar(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('usuario', $request->usuario)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            if ($user->tipo_usuario === 'cuidador') {
                return redirect()->route('menu.cuidador');
            } elseif ($user->tipo_usuario === 'consultante') {
                return redirect()->route('menu.consultante');
            } else {
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'usuario' => 'Tipo de usuario inválido',
                ]);
            }
        } else {
            return redirect()->route('login')->withErrors([
                'usuario' => 'Credenciales incorrectas',
            ]);
        }
    }

    /**
     * Guardar datos del paso 2 del registro.
     */
    public function guardarPaso2(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string|min:4|unique:users,usuario',
            'password' => [
                'required',
                'confirmed', // password_confirmation
                'min:8',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
            ],
        ]);

        // Obtener datos previos y agregar usuario y password
        $datos = session('datos_registro', []);
        $datos['usuario'] = $request->usuario;
        $datos['password'] = $request->password;

        session(['datos_registro' => $datos]);

        return redirect()->route('registro.paso3');
    }

    /**
     * Finalizar el registro (paso 3).
     */
    public function finalizarRegistro(Request $request)
    {
        $request->validate([
            'tipo_usuario' => 'required|in:cuidador,consultante',
        ]);

        $datos = session('datos_registro');

        if (
            !$datos ||
            !isset(
                $datos['nombre'],
                $datos['apellidos'],
                $datos['fecha_nacimiento'],
                $datos['usuario'],
                $datos['password']
            )
        ) {
            return redirect()->route('login')->with('error', 'La sesión expiró o los datos están incompletos. Por favor regístrate nuevamente.');
        }

        try {
            // Crear usuario
            $user = new User();
            $user->nombre = $datos['nombre'];
            $user->apellidos = $datos['apellidos'];
            $user->fecha_nacimiento = $datos['fecha_nacimiento'];
            $user->usuario = $datos['usuario'];
            $user->password = Hash::make($datos['password']);
            $user->tipo_usuario = $request->tipo_usuario;
            $user->save();

            // Limpiar sesión temporal de registro
            session()->forget('datos_registro');

            return redirect()->route('login')->with('success', 'Cuenta creada correctamente. Ahora puedes iniciar sesión.');
        } catch (\Exception $e) {
            return redirect()->route('registro.paso3')->with('error', 'Ocurrió un error al crear la cuenta. Intenta nuevamente.');
        }
    }
}
