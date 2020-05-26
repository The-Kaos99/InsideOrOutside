<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Role;

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
//Auth::routes();
Auth::routes(['register' => false ]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', function () {

   
    $user=new User;
    $role_admin= Role::where('name','admin')->first();
    $user->name='admin';
    $user->email='admin@insideoroutside.site';
    $user->password=bcrypt('Qwerty99');
    $user->save();
    $user->roles()->sync([ Role::where('slug','admin')->first()->id]);
    return $user;
    

});
Route::match(['GET', 'POST'], 'entradas', ['as' => 'entradas', 'uses' => 'SalidasController@showAlumno']);
