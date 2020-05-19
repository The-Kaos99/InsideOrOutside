<?php

namespace App\Http\Controllers;
use App\Padre;
use Illuminate\Http\Request;
use Mail; //Importante incluir la clase Mail, que será la encargada del envío
use App\Mail\PassPadres;
use App\Role;
use App\User;

class PadresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $padres=Padre::all();
        return view('administracion.padres.index',compact('padres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->action('PadresController@index');
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
        //$padre->pass=md5($password);
        
        $padre->pass=bcrypt($password);
        $padre->save();
        $user = new User();
        $user->name=$user->name=$padre->nombre.' '.$padre->apellidos;;
        $user->email=$padre->email;
        $user->password=$padre->pass;
        $user->save();
        $user->roles()->attach($role_padre);
        Mail::to($padre->email)->send(new PassPadres($password , $padre));
        return redirect()->action('PadresController@index')->with('status','Tutor Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   /*
        Hago esto para que si alguien intenta ir a mano al link que lo lleve al inicio 
        */
        return redirect()->action('PadresController@index')->with('status','Esto no es autorizado xD ;)');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $padre=Padre::find($id);
        return view('administracion.padres.edit',compact('padre'));
   
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
        $padre=Padre::find($id);
        $user=User::find($padre->email);
        $padre->fill($request->except('pass'));
        $pass= bcrypt($request->input('contra'));
       
        if($padre->pass!=$pass){
            $padre->pass=$pass;
        }
        $padre->save();
        $user->name=$padre->nombre.' '.$padre->apellidos;
        $user->name=$padre->email;
        $user->name=$padre->nombre;
        $user->password=$padre->pass;
        $user->save();
        return redirect()->action('PadresController@index')->with('status','Tutor Modificado Correctamente');
       
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
           Padre::truncate();
           return redirect()->action('PadresController@index')->with('status','Todos los Tutores Eliminados');
        }
        $padre=Padre::find($id);
        $padre->delete();
        return redirect()->action('PadresController@index')->with('status','Tutor Eliminado Correctamente');
    }
}
