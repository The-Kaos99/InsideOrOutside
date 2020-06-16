<?php

namespace App\Http\Controllers;

use App\Profesor;
use App\Alumno;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Mail; //Importante incluir la clase Mail, que será la encargada del envío
use App\Mail\PassProfesores;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $profesors=  Profesor::all();
        return view('administracion.profesores.index', compact('profesors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return redirect()->action('ProfesoresController@index');
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
            'email'=>'required|email',
        ]);
        $profesor = new Profesor();
        $profesor->nombre = $request->input('nombre');
        $profesor->apellidos = $request->input('apellidos');
        $profesor->email = $request->input('email');
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $password = "";
        for ($i = 0; $i < 8; $i++) {
            //obtenemos un caracter aleatorio escogido de la cadena de caracteres
            $password .= substr($str, rand(0, 62), 1);
        }
        $profesor->pass = bcrypt($password);
        if (User::where('email', '=', $request->input('email'))->exists()) {
            return redirect()->action('ProfesoresController@index')->with('error','Ya existe un usuario con este correo');
         }
        $profesor->save();
        $user = new User();
        $user->name= $profesor->nombre.' '.$profesor->apellidos;
        $user->email= $profesor->email;
        $user->password= bcrypt($password);
        $user->save();
        $user->roles()->sync([ Role::where('slug','profe')->first()->id]);
        Mail::to($profesor->email)->send(new PassProfesores($password , $profesor));
        return redirect()->action('ProfesoresController@index')->with(['status','Profesor Creado'],[]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->action('ProfesoresController@index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesor=Profesor::find($id);
        return view('administracion.profesores.edit',compact('profesor'));
       
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
        $validatedData = $request->validate([
            'nombre'=>'required|max:35',
            'apellidos'=>'required',
            'pass'=>'min:8',
        ]);
        $profesor=Profesor::find($id);
        $user=User::where('email',$profesor->email)->first();
        $profesor->fill($request->except('pass','email'));

        $pass=bcrypt($request->input('pass'));
        if($profesor->pass!=$pass){
            $profesor->pass=$pass;
            $user->password= $pass;
        }
        $user->name=$profesor->nombre.' '.$profesor->apellidos;
        $user->password= $profesor->pass;
        $user->save();
        $profesor->save();
        
        return redirect()->action('ProfesoresController@index')->with('status','Datos Modificados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id=='allDelete') {
            Profesor::truncate();
            return redirect()->action('ProfesoresController@index')->with('status','Todos los Profesores Eliminados Correctamente');
        }
        $profesor=Profesor::find($id);
        $user=User::where('email',$profesor->email)->first();
        $user->delete();
        $profesor->delete();
       
        return redirect()->action('ProfesoresController@index')->with('status','Profesor Eliminado Correctamente');
    }

}
