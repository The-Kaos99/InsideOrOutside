<?php

namespace App\Http\Controllers;

use App\Profesor;
use App\Alumno;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Mail; //Importante incluir la clase Mail, que será la encargada del envío
use App\Mail\PassProfesores;
use Illuminate\Support\Facades\Schema;

class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');
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
        $role_profesor= Role::where('name','profesor')->first();
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
        $profesor->save();
        $user = new User();
        $user->name=$profesor->nombre;
        $user->email=$profesor->email;
        $user->password=bcrypt($password);
        $user->save();
        $user->roles()->attach($role_profesor);
        Mail::to($profesor->email)->send(new PassProfesores($password , $profesor));
        return redirect()->action('ProfesoresController@index');
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
        $profesor=Profesor::find($id);
        $user=User::find($profesor->email);
        $profesor->fill($request->except('pass'));

        $pass=bcrypt($request->input('pass'));
        if($profesor->pass!=$pass){
            $profesor->pass=$pass;
            $user->password=bcrypt($password);
        }
        $profesor->save();
        $user->name=$profesor->nombre;
        $user->email=$profesor->email;
        
        $user->save();
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
            $profesors=Profesor::all();
            return view('administracion.profesores.index',compact('profesors'));
        }
        $profesor=Profesor::find($id);
        $profesor->delete();
        return redirect()->action('ProfesoresController@index')->with('status','Todos los Profesores Eliminados Correctamente');
    }

    public function deleteAllProfesor()
    {
        Profesor::truncate(); 
        return redirect()->action('ProfesoresController@index')->with('status','Profesor Eliminado Correctamente');
    }
}
