<?php

namespace App\Http\Controllers;
use App\Padre;
use Illuminate\Http\Request;
use Mail; //Importante incluir la clase Mail, que será la encargada del envío
use App\Mail\PassPadres;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;

class PadresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if( Auth::user()->roles()->first()->slug!='admin', 403);
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
        abort_if( Auth::user()->roles()->first()->slug!='admin', 403);
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
            return redirect()->action('PadresController@index')->with('status','Ya existe un usuario con este correo');
         }
        $padre->save();
        $user = new User();
        $user->name= $padre->nombre.' '.$padre->apellidos;
        $user->email= $padre->email;
        $user->password=bcrypt($password);
        $user->save();
        $user->roles()->sync([ Role::where('slug','padre')->first()->id]);
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
        $validatedData = $request->validate([
            'nombre'=>'required|max:35',
            'apellidos'=>'required',
            'pass'=>'required|min:8',
        ]);
        $padre=Padre::find($id);
        $user=User::find($padre->email);
        $padre->fill($request->except('pass','email'));
        $pass= bcrypt($request->input('contra'));
       
        if($padre->pass!=$pass){
            $padre->pass=$pass;
        }
        
        $user->name=$padre->nombre.' '.$padre->apellidos;
        $user->name=$padre->email;
        $user->name=$padre->nombre;
        $user->password=$padre->pass;
        $user->save();
        $padre->save();
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
        $user=User::where('email',$padre->email)->first();
        $user->delete();
        $padre->delete();
        return redirect()->action('PadresController@index')->with('status','Tutor Eliminado Correctamente');
    }
}
