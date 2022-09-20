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

        Permission::create([
            'name' => 'posts.index',
            'description' => 'Ver Noticias Publicadas',
        ])->syncRoles([$roleAdm, $rolePre]);
        Permission::create([
            'name' => 'borradores.index',
            'description' => 'Ver Borradores de Noticias',
        ])->syncRoles([$roleAdm, $rolePre]);
        Permission::create([
            'name' => 'posts.create',
            'description' => 'Crear Noticias',
        ])->syncRoles([$roleAdm, $rolePre]);
        Permission::create([
            'name' => 'posts.edit',
            'description' => 'Editar Noticias',
        ])->syncRoles([$roleAdm, $rolePre]);
        Permission::create([
            'name' => 'posts.destroy',
            'description' => 'Eliminar Noticias',
        ])->syncRoles([$roleAdm, $rolePre]);
        
        Permission::create([
            'name' => 'users.index',
            'description' => 'Ver Usuarios',
        ])->syncRoles([$roleAdm]);
        Permission::create([
            'name' => 'users.create',
            'description' => 'Crear Usuarios',
        ])->syncRoles([$roleAdm]);
        Permission::create([
            'name' => 'users.edit',
            'description' => 'Editar Usuarios',
        ])->syncRoles([$roleAdm]);
        Permission::create([
            'name' => 'users.destroy',
            'description' => 'Eliminar Usuarios',
        ])->syncRoles([$roleAdm]);
        
        Permission::create([
            'name' => 'roles.index',
            'description' => 'Ver Roles',
        ])->syncRoles([$roleAdm]);
        Permission::create([
            'name' => 'roles.create',
            'description' => 'Crear Roles',
        ])->syncRoles([$roleAdm]);
        Permission::create([
            'name' => 'roles.edit',
            'description' => 'Editar Roles',
        ])->syncRoles([$roleAdm]);
        Permission::create([
            'name' => 'roles.destroy',
            'description' => 'Eliminar Roles',
        ])->syncRoles([$roleAdm]);
    }
}
