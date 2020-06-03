<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Padre;
use DB;

class ZonaProfeController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profesorado.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $tipo)
    {
        switch ($tipo) {
            case 'alumnos':
                return view('profesorado.createAlumno');
                
                break;
            case 'padres':
                if (request()->get('padres')==='all') {
                    $padres=Padre::all();                    
                    return view('profesorado.showPadres',compact('padres'));
                }
                break;
            
            default:
                # code...
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request ,$tipo )
    {
        switch ($tipo) {
            case 'alumnos':
                if (request()->get('alumno')==='all') {
                    $alumnos=Alumno::all();
                    return view('profesorado.showAlumnos',compact('alumnos'));
                }
                $alumno=Alumno::where('slug','=',request()->get('alumno'))->firstOrFail();
                $registros=DB::table('salidas')
                ->where('alumno_id', '=', $alumno->id)
                ->orderBy('salidas.fecha','desc')
                ->get();
                return view('profesorado.showAlumno',compact('alumno'),compact('registros'));
                
                break;
            case 'padres':
                if (request()->get('padres')==='all') {
                    $padres=Padre::all();                    
                    return view('profesorado.showPadres',compact('padres'));
                }
                break;
            
            default:
                # code...
                break;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$tipo)
    {
        switch ($tipo) {
            case 'alumnos':                
                $alumno=Alumno::where('slug','=',request()->get('alumno'))->firstOrFail();
                $alumno->delete();
                return redirect( url()->previous() );
                
                break;
            case 'padres':
                $padre=Padre::where('id','=',request()->get('padre'))->firstOrFail();
                $padre->delete();
                return redirect( url()->previous() );
                break;
            
            default:
                # code...
                break;
        }
    }
}
