<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Alumno;
use App\Salida;


class SalidasController extends Controller
{
   public function index(Request $request)
   {
       return view('entrada'.compact('alumno'));
   }
   public function showAlumno(Request $slug)
   {
       //https://www.youtube.com/watch?v=zXSAxz90WAY
       $alumno= Alumno::where('slug',$slug);
      
       return 'hola0';
       return view('entrada'.compact('alumno'));
   }
}
