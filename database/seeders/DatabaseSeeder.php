<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'employee']);
        Permission::firstOrCreate(['name' => 'crear cartas de asignacion']);
        Permission::firstOrCreate(['name' => 'ver dispositivos asignados']);
        $admin = User::where('email', 'vicohdz.fraga@gmail.com')->first();
        if ($admin) {
            $admin->assignRole('admin');
        }
        $employee = User::where('email', 'pololohdz2000@gmail.com')->first();
        if ($employee) {
            $employee->assignRole('employee');
        }
    }
}