<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesor;
use App\Alumno;
use App\Padre;
use App\Role;
use App\User;

class AdministracionController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');
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