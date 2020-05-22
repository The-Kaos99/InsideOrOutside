<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Administrador',
            'slug'=>'admin',
            'description'=>'Rol de administracion'
        ]);
        DB::table('roles')->insert([
            'name' => 'Profesor',
            'slug'=>'profe',
            'description'=>'Rol de profesores'
        ]);
        DB::table('roles')->insert([
            'name' => 'Padres',
            'slug'=>'padre',
            'description'=>'Rol de Padres'
        ]);
        DB::table('roles')->insert([
            'name' => 'Alumno',
            'slug'=>'alumno',
            'description'=>'Rol de Alumno'
        ]);
        DB::table('roles')->insert([
            'name' => 'Conserje',
            'slug'=>'conserje',
            'description'=>'Rol de Conserje'
        ]);
    }
}
