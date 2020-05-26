<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Alumno;
use \Milon\Barcode\DNS1D;
use \Milon\Barcode\DNS2D; 
use App\Salida;


class SalidasController extends Controller
{
    public function index(Request $request)
    {
        $alumnos=Alumno::all();
        return view('entrada', compact('alumnos'));
    }

    public function showAlumno(Request $request)
    {
        //$alumno = Alumno::where('slug', $request->input('codig_baras'))->firstOrFail();
        try {

            if ($request->isMethod('post')) {
                $alumno = Alumno::where('slug', $request->input('codig_baras'))->firstOrFail(); 

                $salida= new Salida;
                $salida->alumno_id= $alumno->id;
                $salida->save();
                return view('entrada', compact('alumno'));
               
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error_message', $e->getMessage());
        }

        return view('entrada', compact('alumno'));

    }
}
