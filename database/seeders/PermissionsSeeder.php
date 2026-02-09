<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Definir permisos básicos
        $permissions = [
            'gestionar_usuarios',
            'crear_venta_motos',
            'crear_venta_repuestos',
            'registrar_servicio_taller',
        ];

        // Crear permisos si no existen
        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Definir roles y sus permisos
        $rolesWithPermissions = [
            'admin' => $permissions, // Admin tiene todos los permisos
            'vendedor_motos' => ['crear_venta_motos'],
            'vendedor_repuestos' => ['crear_venta_repuestos'],
            'mecanico' => ['registrar_servicio_taller'],
        ];

        // Crear roles y asignar permisos
        foreach ($rolesWithPermissions as $roleName => $perms) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($perms); 
        }
    }
}