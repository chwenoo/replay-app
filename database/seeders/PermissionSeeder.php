<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission_names = [
            "dashboard",
            "user_list",
            "role_list",
            "permission_list",
            "article_list",
            "product_list",

            "user_create", "user_edit", "user_delete",
            "role_create", "role_edit", "role_delete",
            "permission_create", "permission_edit", "permission_delete",
            "article_create", "article_edit", "article_delete",
            "product_create", "product_edit", "product_delete",
        ];
        foreach($permission_names as $name) {
            \Spatie\Permission\Models\Permission::create([
                "name" => "$name",
                // 'guard_name' => 'web',
            ]);
        }

        // \Spatie\Permission\Models\Permission::insert($names);

    }
}
