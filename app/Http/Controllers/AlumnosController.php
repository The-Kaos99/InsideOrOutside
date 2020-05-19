<?php

namespace App\Http\Controllers;
use App\Alumno;
use \Milon\Barcode\DNS1D;
use \Milon\Barcode\DNS2D; 
use Illuminate\Http\Request;
use Mail; //Importante incluir la clase Mail, que será la encargada del envío
use Image;//para las imagenes 

class AlumnosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $alumnos=Alumno::all();        
        return view('administracion.alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->action('AlumnosController@index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre'=>'required|max:35',
            'apellidos'=>'required',
            'imagen'=>'required|image',
            'fech_nac'=>'required',
            'unidad'=>'required',
            'curso'=>'required',
        ]);
        $alumno= new Alumno();
        if ($request->hasFile('imagen')) {
            $file= $request->file('imagen');
            $alumno->nombre=$request->input('nombre');
            $alumno->apellidos=$request->input('apellidos');
            $name= $alumno->nombre."_".$alumno->apellidos."_".time().".jpg";
            $file->move(public_path().'/images',$name);
            $alumno->imagen=$name;
             
        }else{
            $alumno->imagen='$name';
        }
        $alumno->fech_nac=$request->input('fech_nac');
        $alumno->curso=$request->input('curso');
        $alumno->unidad=$request->input('unidad');
        $alumno->slug=time();
        $alumno->save();
        $img = Image::make(public_path().'/images/'.$alumno->imagen);
        $img->save(public_path().'/images/'.$alumno->imagen, 50);
        return redirect()->action('AlumnosController@index')->with('status','Alumno Creado Correctamente');
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $alumno =ALumno::where('slug','=',$slug)->firstOrFail();     
        return view('administracion.alumnos.show',compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $alumno =ALumno::where('slug','=',$slug)->firstOrFail();
        
        return view('administracion.alumnos.edit',compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $alumno =ALumno::where('slug','=',$slug)->firstOrFail();
        $alumno->fill($request->except('imagen','unidad'));
        if ($request->hasFile('imagen')) {
            $file= $request->file('imagen');  
            $name= $alumno->nombre."_".$alumno->apellidos."_".time().".jpg";
            $file->move(public_path().'/images',$name);
            unlink(public_path().'/images/'.$alumno->imagen);
            $alumno->imagen=$name;
            $img = Image::make(public_path().'/images/'.$alumno->imagen);
            $img->save(public_path().'/images/'.$alumno->imagen, 50);
        }
        $alumno->unidad=$request->input('unidad');
        $alumno->save();
        return redirect()->action('AlumnosController@index')->with('status','Datos modificados');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        if ($slug=='allDelete') {
            Alumno::truncate(); 
            $files = glob(public_path().'/images/*'); //obtenemos todos los nombres de los ficheros
            foreach($files as $file){
                if(is_file($file))
                unlink($file); //elimino el fichero
            }
            return redirect()->action('AlumnosController@index')->with('status','Todos los Alumnos eliminado');
        }
            $alumno= Alumno::where('slug','=',$slug)->firstOrFail();
            $file_path=public_path().'/images/'.$alumno->imagen;
            \File::delete($file_path);
            $alumno->delete();
            return redirect()->action('AlumnosController@index')->with('status','Alumno eliminado');
        
    }
    
}
