<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $this->createRoles();
        $this->createPermissions();
    }

    private function createRoles()
    {
        $roles = collect(config('roles'))->keys();

        $userRoles = $roles->map(fn ($role) => [
            'name' => $role,
            'guard_name' => 'api'
        ]);

        Role::insert($userRoles->toArray());
    }

    private function createPermissions()
    {
        $permissions = collect(
            Arr::flatten(config('roles'))
        )->values();

        $userPermissions = $permissions->map(fn ($role) => [
            'name' => $role,
            'guard_name' => 'api'
        ]);

        Permission::insert($userPermissions->toArray());
    }

    private function assignPermissionToRole()
    {
    }
}
