<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->name = 'Usuario Prueba';
        $user->username = 'administrador';
        $user->email = 'prueba@test.com';
        $user->password = Hash::make('11111111');
        $user->assignRole('Admin');

        $user->save();

        User::factory(9)->create();
    }
}
