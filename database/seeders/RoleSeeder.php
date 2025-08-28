<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $user = Role::firstOrCreate(['name' => 'user']);

        $manageContents = Permission::firstOrCreate(['name' => 'manage contents']);
        $viewContents   = Permission::firstOrCreate(['name' => 'view contents']);

        $admin->givePermissionTo([$manageContents, $viewContents]);
        $user->givePermissionTo([$viewContents]);
    }
}
