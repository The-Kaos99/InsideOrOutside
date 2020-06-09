<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Role;
use App\Salida;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'InicioController@index');
Route::get('/primeros_pasos', 'InicioController@primeros_pasos');
Route::get('admin', 'AdministracionController@index')->name('admin');
Route::delete('admin', 'AdministracionController@deleteAll');
Route::Resource("admin/profesores","ProfesoresController");
Route::Resource("admin/alumnos","AlumnosController");
Route::Resource("admin/padres","PadresController");
Auth::routes(['register' => false ]);
Route::get('/home', 'HomeController@index')->name('home');
Route::match(['GET', 'POST'], 'profesorado/entradas', ['as' => 'entradas', 'uses' => 'SalidasController@showAlumno']);
Route::Resource("profesorado","ZonaProfeController");
Route::get('profe/createAlumno', 'AuxiliarController@createAlumno');
Route::match(['GET', 'POST'], 'profesorado/createAlumno',  ['as' => 'CreateAlumnoProfe', 'uses' => 'AuxiliarController@createAlumno']);
Route::post('profesorado/storeAlumno','AuxiliarController@storeAlumno');
Route::match(['GET', 'POST'], 'profesorado/createPadre',  ['as' => 'CreatePadreProfe', 'uses' => 'AuxiliarController@createPadre']);
Route::post('profesorado/storePadre','AuxiliarController@storePadre');
Route::get('salidas','AuxiliarController@showRegistro');
Route::match(['GET', 'POST'], 'admin/alumnos/imprimir', ['as' => 'carne', 'uses' => 'AuxiliarController@imprimir']);
Route::match(['GET', 'POST'], 'profesorado/alumnos/imprimir', ['as' => 'carne', 'uses' => 'AuxiliarController@imprimir']);
Route::get('/familia', 'ZonaPadreController@index')->name('familia');
Route::get('/test', function () {

    $salida = Salida::where('alumno_id', 3);

    return $salida;
    $user=new User;
    $role_admin= Role::where('name','admin')->first();
    $user->name='admin';
    $user->email='admin@insideoroutside.site';
    $user->password=bcrypt('Qwerty99');
    $user->save();
    $user->roles()->sync([ Role::where('slug','admin')->first()->id]);
    return $user;
    

});

