<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Clase `DatabaseSeeder`
 * 
 * Seeder para la creación de roles, permisos y usuarios con asignación de roles.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Ejecuta el seeder.
     * 
     * Crea roles, permisos y asigna los roles a usuarios específicos en la base de datos.
     *
     * @return void
     */
    public function run(): void
    {
        // ✅ Creación de roles si no existen
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'employee']);
        Role::firstOrCreate(['name' => 'dss']); // ✅ Nuevo rol DSS

        // ✅ Creación de permisos
        Permission::firstOrCreate(['name' => 'crear cartas de asignacion']);
        Permission::firstOrCreate(['name' => 'ver dispositivos asignados']);

        // ✅ Asignar el rol "admin" a un usuario específico
        $admin = User::where('email', 'vicohdz.fraga@gmail.com')->first();
        if ($admin) {
            $admin->assignRole('admin');
        }

        // ✅ Asignar el rol "employee" a un usuario específico
        $employee = User::where('email', 'pololohdz2000@gmail.com')->first();
        if ($employee) {
            $employee->assignRole('employee');
        }

        // ✅ Crear usuario con rol "dss" si no existe
        $dssUser = User::firstOrCreate(
            ['email' => 'paosaenz201@gmail.com'],
            [
                'name' => 'Paola',
                'password' => Hash::make('password123'), // Se requiere en caso de autenticación estándar
            ]
        );

        if ($dssUser) {
            $dssUser->assignRole('dss'); // ✅ Asignar rol DSS
        }

        echo "✅ Roles y usuarios creados correctamente.\n";
    }
}
