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
     *
     * @return void
     */
    public function run()
    {
        $roleAdm = Role::create(['name' => 'Admin']);
        $rolePre = Role::create(['name' => 'Prensa']);

        Permission::create(['name' => 'posts.index'])->syncRoles([$roleAdm, $rolePre]);
        Permission::create(['name' => 'posts.create'])->syncRoles([$roleAdm, $rolePre]);
        Permission::create(['name' => 'posts.edit'])->syncRoles([$roleAdm, $rolePre]);
        Permission::create(['name' => 'posts.destroy'])->syncRoles([$roleAdm, $rolePre]);
        
        Permission::create(['name' => 'users.index'])->syncRoles([$roleAdm]);
        Permission::create(['name' => 'users.create'])->syncRoles([$roleAdm]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$roleAdm]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$roleAdm]);
    }
}
