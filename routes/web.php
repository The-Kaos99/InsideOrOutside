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
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard-admin', function (){
    return view('views.vista_para_admin');
})->name('admin.dashboard');
Route::get('/test', function () {

   /* return Role::create([
        'name'=>'Padre',
        'slug'=>'padre',
        'description'=>'Padre',
    ]);

   return Role::create([
        'name'=>'Admin',
        'slug'=>'admin',
        'description'=>'administrador',
    ]);*/
    /**/
    $user=User::where('email','mariansomesa@gmail.com')->first();
    $role_admin= Role::where('name','admin')->first();
   // $user->roles()->attach([$role_admin->id]);
    //$user->roles()->detach([$role_admin->id]);
    //$user->roles()->attach([ Role::where('name','admin')->first()->id]);
    $user->roles()->sync([ Role::where('name','admin')->first()->id]);
    return $user->roles;
    

});
