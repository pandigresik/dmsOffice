<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $user = \App\Models\User::factory([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@admin.com'),
        ])->create();

        $role = \App\Models\Role::create([
            'name' => 'administrator',
            'guard_name' => 'web',
        ]);

        $user->syncRoles($role);
        
        \App\Models\Permission::insert([
            [
                'name' => 'menu-index',
                'guard_name' => 'web',
            ],
            [
                'name' => 'menu-create',
                'guard_name' => 'web',
            ],
            [
                'name' => 'menu-update',
                'guard_name' => 'web',
            ],
            [
                'name' => 'menu-delete',
                'guard_name' => 'web',
            ],            
            [
                'name' => 'user-index',
                'guard_name' => 'web',
            ],
            [
                'name' => 'user-create',
                'guard_name' => 'web',
            ],
            [
                'name' => 'user-update',
                'guard_name' => 'web',
            ],
            [
                'name' => 'user-delete',
                'guard_name' => 'web',
            ],
            [
                'name' => 'role-index',
                'guard_name' => 'web',
            ],
            [
                'name' => 'role-create',
                'guard_name' => 'web',
            ],
            [
                'name' => 'role-update',
                'guard_name' => 'web',
            ],
            [
                'name' => 'role-delete',
                'guard_name' => 'web',
            ],
            [
                'name' => 'permission-index',
                'guard_name' => 'web',
            ],
            [
                'name' => 'permission-create',
                'guard_name' => 'web',
            ],
            [
                'name' => 'permission-update',
                'guard_name' => 'web',
            ],
            [
                'name' => 'permission-delete',
                'guard_name' => 'web',
            ]
        ]);
        $permissions = \App\Models\Permission::get()->pluck('id')->toArray();
        $role->syncPermissions($permissions);
        
        \App\Models\Menus::insert([
            [
                'name' => 'Master',
                'description' => 'Header menu master',
                'status' => 1,
                'icon' => 'cil-address-book',
                'route' => NULL,
                'parent_id' => NULL,
                'seq_number' => 1,
            ],
            [
                'name' => 'Report',
                'description' => 'Header menu report',
                'status' => 1,
                'icon' => 'cil-address-book',
                'route' => NULL,
                'parent_id' => NULL,
                'seq_number' => 2,
            ],
            [
                'name' => 'Transaction',
                'description' => 'Header menu transaction',
                'status' => 1,
                'icon' => 'cil-address-book',
                'route' => NULL,
                'parent_id' => NULL,
                'seq_number' => 3,
            ],            
            [
                'name' => 'Menu',
                'description' => 'Manage menu',
                'status' => 1,
                'icon' => 'cil-address-book',
                'route' => 'menus',
                'parent_id' => 1,
                'seq_number' => 1,
            ],
            [
                'name' => 'User',
                'description' => 'Manage users',
                'status' => 1,
                'icon' => 'cil-address-book',
                'route' => 'users',
                'parent_id' => 1,
                'seq_number' => 2,
            ],
            [
                'name' => 'Role',
                'description' => 'Manage role',
                'status' => 1,
                'icon' => 'cil-address-book',
                'route' => 'roles',
                'parent_id' => 1,
                'seq_number' => 3,
            ],
            [
                'name' => 'Permission',
                'description' => 'Manage users',
                'status' => 1,
                'icon' => 'cil-address-book',
                'route' => 'permissions',
                'parent_id' => 1,
                'seq_number' => 1,
            ],
        ]);
        \App\Models\MenusTree::fixTree();
        
        \App\Models\MenuPermissions::insert([
            ['menu_id' => 4, 'permission_id' => 1],
            ['menu_id' => 4, 'permission_id' => 2],
            ['menu_id' => 5, 'permission_id' => 5],
            ['menu_id' => 5, 'permission_id' => 6],
            ['menu_id' => 6, 'permission_id' => 9],
            ['menu_id' => 6, 'permission_id' => 10],
            ['menu_id' => 5, 'permission_id' => 13],
            ['menu_id' => 5, 'permission_id' => 14]
        ]);
    }
}
