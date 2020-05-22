<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profesor;
use App\Alumno;
use App\Padre;
use App\Role;
use App\User;


class AdministracionController extends Controller
{
    public function index(Request $request)
    {
        abort_if( Auth::user()->roles()->first()->slug!='admin', 403);
        return view("administracion.index");
    }
    
   
    public function deleteAll()
    {
        Alumno::truncate();     
        Profesor::truncate();   
        Padre::truncate();      
        return view('administracion.index');      
    }
    
    
}