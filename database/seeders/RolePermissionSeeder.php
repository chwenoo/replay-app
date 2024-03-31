<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminPermissions = Permission::whereIn('name', [
            'dashboard', 'user_list', 'role_list', 'permission_list', 'article_list', 'product_list',
            "user_create", "user_edit", "user_delete",
            "role_create", "role_edit", "role_delete",
            "permission_create", "permission_edit", "permission_delete",
            "article_create", "article_edit", "article_delete",
            "product_create", "product_edit", "product_delete",
        ])->pluck('name');

        $admin = Role::find(1);
        $admin->syncPermissions($adminPermissions);

        $editorPermissions = Permission::whereIn('name', [
            'dashboard', 'user_list', 'role_list', 'article_list', 'product_list',
            "user_create", "user_edit", "user_delete",
            "role_create", "role_edit", "role_delete",
            "article_create", "article_edit", "article_delete",
            "product_create", "product_edit", "product_delete",
        ])->pluck('name');

        $editor = Role::find(2);
        $editor->syncPermissions($editorPermissions);

        $guestPermissions = Permission::whereIn('name', [
            'dashboard', 'article_list', 'product_list',
            "user_list",
            "article_create", "article_edit", "article_delete",
            "product_create", "product_edit", "product_delete",
        ])->pluck('name');

        $guest = Role::find(3);
        $guest->syncPermissions($guestPermissions);
    }
}
