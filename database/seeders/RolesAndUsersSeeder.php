<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Seeder `RolesAndUsersSeeder`
 * 
 * Se encarga de la creación de los roles y la asignación de estos a usuarios predefinidos en la base de datos.
 */
class RolesAndUsersSeeder extends Seeder
{
    /**
     * Ejecuta el seeder.
     * 
     * Crea los roles `admin` y `employee` y asigna dichos roles a usuarios específicos.
     *
     * @return void
     */
    public function run(): void
    {
        // ✅ Creación de roles si no existen
        $adminRole = Role::firstOrCreate(['name' => 'admin']); // Rol de administrador
        $employeeRole = Role::firstOrCreate(['name' => 'employee']); // Rol de empleado

        // ✅ Creación del usuario administrador si no existe
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'), // Se puede cambiar la contraseña por seguridad
            ]
        );
        $adminUser->assignRole($adminRole); // ✅ Asignar rol de administrador

        // ✅ Creación del usuario empleado si no existe
        $employeeUser = User::firstOrCreate(
            ['email' => 'employee@example.com'],
            [
                'name' => 'Employee User',
                'password' => Hash::make('password'), // Se puede cambiar la contraseña
            ]
        );
        $employeeUser->assignRole($employeeRole); // ✅ Asignar rol de empleado

        echo "✅ Roles y usuarios creados correctamente.\n";
    }
}
