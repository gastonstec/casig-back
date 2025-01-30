<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndUsersSeeder extends Seeder
{
    public function run()
    {
        // Crear roles
        $adminRole = Role::create(['name' => 'admin']); // Rol de administrador
        $employeeRole = Role::create(['name' => 'employee']); // Rol de empleado

        // Crear usuario administrador
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Cambia 'password' por la contraseña que quieras
        ]);
        $adminUser->assignRole($adminRole);

        // Crear usuario empleado
        $employeeUser = User::create([
            'name' => 'Employee User',
            'email' => 'employee@example.com',
            'password' => Hash::make('password'), // Cambia 'password' por la contraseña que quieras
        ]);
        $employeeUser->assignRole($employeeRole);

        echo "Roles y usuarios creados correctamente.\n";
    }
}
