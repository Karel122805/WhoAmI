<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // Datos personales (Paso 1)
            $table->string('nombre');
            $table->string('apellidos');
            $table->date('fecha_nacimiento');

            // Credenciales (Paso 2)
            $table->string('usuario')->unique();
            $table->string('password');

            // Tipo de usuario (Paso 3)
            $table->enum('tipo_usuario', ['cuidador', 'consultante']);

            // Tokens y timestamps
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
