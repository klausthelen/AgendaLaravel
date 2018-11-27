<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Administrador',
            'lastname' => 'Plataforma',
            'email' => 'correoadministradort@correo.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'id' => 1,
            'identification' => '00000',
            'name' => 'Usuario',
            'lastname' => 'Default',
            'gender' => 'Hombre',
            'birthdate' => '2000-01-01',
            'email' => 'correousuario@correo.com',
            'password' => Hash::make('password'),
        ]);
    }
}
