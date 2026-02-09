<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles básicos si no existen
        $roles = [
            'admin',
            'vendedor_motos',
            'vendedor_repuestos',
            'mecanico',
        ];

        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        // Crear usuario admin si no existe
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrador',
                'password' => bcrypt('password'), // cámbialo por una contraseña segura
            ]
        );

        // Asignar rol admin al usuario
        if (!$user->hasRole('admin')) {
            $user->assignRole('admin');
        }
    }
}