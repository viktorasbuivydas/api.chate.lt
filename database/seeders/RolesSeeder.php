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
        $this->assignPermissionToRole();
    }

    private function createRoles()
    {
        $roles = collect(config('roles'))->keys();

        $userRoles = $roles->map(fn ($role) => [
            'name' => $role,
            'guard_name' => 'web',
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
            'guard_name' => 'web',
        ]);

        Permission::insert($userPermissions->toArray());
    }

    private function assignPermissionToRole()
    {
        $roles = Role::all();

        $roles->map(function ($role) {
            $permissions = match ($role->name) {
                'vip' => ['vip'],
                'moderator' => ['vip', 'moderator'],
                'admin' => ['vip', 'moderator', 'admin'],
                'super admin' => ['vip', 'moderator', 'admin', 'super admin']
            };

            $role->givePermissionTo(
                $this->getPermission($permissions)
            );
        });
    }

    private function getPermission(array $roles)
    {
        return collect($roles)->map(
            fn ($role) => collect(
                Arr::get(config('roles'), $role)
            )
        )->flatten();
    }
}
