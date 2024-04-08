<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'access',
        ];
        foreach ($permissions as $name) {
            Permission::create(['name' => $name]);
        }

        $pos = [
            'admin' => 'Administrator',
            'moder' => 'Tekseriwshi',
            'student' => 'Oqıwshı',
        ];

        $roles = [
            'admin' => [
                'access'
            ],
            'moder' => [
                'access'
            ],
            'student' => [
                'access'
            ],
        ];

        foreach ($roles as $name => $value) {
            $role = Role::create([
                'name' => $name,
                'desc' => $pos[$name],
            ]);
            $role->syncPermissions($value);
        }
    }
}
