<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            // "super admin",
            "admin",
            "editor",
            "guest",
        ];
        foreach($names as $name) {
            \Spatie\Permission\Models\Role::create([
                "name" => "$name",
            ]);
        }
    }
}
