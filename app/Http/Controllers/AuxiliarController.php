<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Alumno;
use App\Padre;
use App\User;
use App\Role;
use App\Salida;
use PDF;
use DB;
use \Milon\Barcode\DNS1D;
use \Milon\Barcode\DNS2D; 
use Mail; //Importante incluir la clase Mail, que será la encargada del envío
use Image;//para las imagenes 



class AuxiliarController extends Controller
{
    public function createAlumno(Request $request)
    {
        abort_if( Auth::user()->roles()->first()->slug!='profe', 403);
        return view('profesorado.createAlumno');
        
    }
    public function storeAlumno(Request $request)
    {
        abort_if( Auth::user()->roles()->first()->slug!='profe', 403);
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
        return  view('profesorado.createAlumno')->with('status','Alumno Creado Correctamente');
       
        
    }
    public function createPadre()
    {
        abort_if( Auth::user()->roles()->first()->slug!='profe', 403);
        return view('profesorado.createPadre');
        
    }
    public function storePadre(Request $request)
    {
        abort_if( Auth::user()->roles()->first()->slug!='profe', 403);
        $validatedData = $request->validate([
            'nombre'=>'required|max:35',
            'apellidos'=>'required',
            'email'=>'required|email',
        ]);
        $padre= new Padre();
        $padre->nombre=$request->input('nombre');
        $padre->apellidos=$request->input('apellidos');
        $padre->email=$request->input('email');
        $padre->telefono=$request->input('telefono');
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $password = "";
        for ($i = 0; $i < 8; $i++) {
            //obtenemos un caracter aleatorio escogido de la cadena de caracteres
            $password .= substr($str, rand(0, 62), 1);
        }
        $padre->pass=bcrypt($password);
        if (User::where('email', '=', $request->input('email'))->exists()) {
            return  view('profesorado.createPadre')->with('status','Ya existe un usuario con este correo');
         }
        $padre->save();
        $user = new User();
        $user->name= $padre->nombre.' '.$padre->apellidos;
        $user->email= $padre->email;
        $user->password=bcrypt($password);
        $user->save();
        $user->roles()->sync([ Role::where('slug','padre')->first()->id]);
        Mail::to($padre->email)->send(new PassPadres($password , $padre));
        return  view('profesorado.createPadre')->with('status','Tutor Creado Correctamente');
        
       
        
    }
    public function showRegistro()
    {
        abort_if( Auth::user()->roles()->first()->slug!='profe', 403);
        $salidas = DB::table('salidas')
        ->join('alumnos','alumnos.id','=','salidas.alumno_id')
        ->select('alumnos.id as alumno_id','alumnos.nombre','alumnos.apellidos','alumnos.slug','alumnos.unidad','alumnos.imagen','salidas.fecha','salidas.id')
        ->orderBy('salidas.fecha','desc')
        ->get();        
       return  view('profesorado.listaSalidas' , compact('salidas'));

    }


    public function imprimir(Request $request){
        $slug=$request->input('slug');
        $alumno =ALumno::where('slug','=',$slug)->firstOrFail();
        $style = array(
            'position' => '',
            'align' => 'C',
            'stretch' => false,
            'fitwidth' => true,
            'cellfitalign' => '',
            'border' => true,
            'hpadding' => 'auto',
            'vpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255),
            'text' => true,
            'font' => 'helvetica',
            'fontsize' => 8,
            'stretchtext' => 4
        );
        
        PDF::SetTitle($alumno->nombre.' '.$alumno->apellidos);
        PDF::AddPage();
        
        $html = <<<EOD
                    <h4>{$alumno->nombre} {$alumno->apellidos}</h4>
                    <h6>Nacimiento: $alumno->fech_nac</h6>
                    <h6>Curso: $alumno->unidad</h6>
EOD;
        PDF::writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        PDF::write1DBarcode($alumno->slug, 'C128', '', '', '', 18, 0.4, $style, 'N'); 
        $x = 15;
        $y = 48;
        $w = 30;
        $h = 65;
        $file_path=public_path().'/images/'.$alumno->imagen;
        //PDF::Rect($x, $y, $w, $h, 'F', array(), array(128,255,128));
        PDF::Image($file_path,  $x, $y, $w, $h, 'JPG', '', '', false, 300, '', false, false, 0, 0, false, false);      
        
        PDF::Output($alumno->nombre.' '.$alumno->apellidos.'.pdf');
        
   }
}
