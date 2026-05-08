<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EncriptarPasswords extends Command
{
    protected $signature = 'pass:encriptar';
    protected $description = 'Encripta las contraseñas que no están encriptadas con bcrypt';

    public function handle()
    {
        // Buscar usuarios con contraseñas no encriptadas (no empiezan con $2y$)
        $usuarios = User::where('password', 'NOT LIKE', '$2y$%')->get();

        if ($usuarios->isEmpty()) {
            $this->info('✅ No hay contraseñas pendientes de encriptar');
            return;
        }

        $this->info("🔍 Encontrados {$usuarios->count()} usuarios con contraseñas sin encriptar");

        foreach ($usuarios as $usuario) {
            $password_original = $usuario->password;

            // Encriptar la contraseña con bcrypt
            $usuario->password = Hash::make($usuario->password);
            $usuario->save();

            $this->line("   ✅ Usuario: {$usuario->email} - Contraseña original: '{$password_original}' → Encriptada");
        }

        $this->info("\n🎉 Todas las contraseñas han sido encriptadas correctamente");
    }
}
