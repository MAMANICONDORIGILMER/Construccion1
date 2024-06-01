<?php

use Illuminate\Database\Seeder;

class UsuarioTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert([
            'Nombre' => 'Admin',
            'Apellido' => 'Administrador',
            'Correo' => 'admin@gestion.com',
            'password' => bcrypt('admin'),
            'TipoUsuarioId' => 1
        ]);

        DB::table('usuario')->insert([
            'Nombre' => 'Luis',
            'Apellido' => 'Caxi',
            'Correo' => 'luis@gmail.com',
            'password' => bcrypt('gestion'),
            'TipoUsuarioId' => 2
        ]);

        DB::table('usuario')->insert([
            'Nombre' => 'Jesus',
            'Apellido' => 'Delgado',
            'Correo' => 'delgado@gmail.com',
            'password' => bcrypt('gestion'),
            'TipoUsuarioId' => 3
        ]);

        DB::table('usuario')->insert([
            'Nombre' => 'Jesus',
            'Apellido' => 'Escalante',
            'Correo' => 'escalante@gmail.com',
            'password' => bcrypt('gestion'),
            'TipoUsuarioId' => 3
        ]);

        DB::table('usuario')->insert([
            'Nombre' => 'Javier',
            'Apellido' => 'Neira',
            'Correo' => 'javier@gmail.com',
            'password' => bcrypt('gestion'),
            'TipoUsuarioId' => 3
        ]);
    }
}
