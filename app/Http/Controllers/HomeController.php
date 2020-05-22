<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;

class HomeController extends Controller
{
    /*
    https://www.youtube.com/user/jeremiselxi/playlists
    https://www.youtube.com/watch?v=0FwzpRHN5YQ&list=PLtg6DxcGyHSvB6xvQbacVfL83UoFEvOGz&index=3
    https://laravel.com/docs/7.x/authentication
    https://www.youtube.com/watch?v=6Eb0hLlC9GE&list=PLHQYBJgtbP-tD8tFedmxgC9Q4Hzw105Po&index=3
    https://www.youtube.com/watch?v=ISUiuhuIKQY
    https://laravel.com/docs/7.x/authentication
    https://es.stackoverflow.com/questions/177114/c%C3%B3mo-redirigir-a-un-usuario-seg%C3%BAn-su-rol-en-laravel
    https://www.youtube.com/watch?v=_vfIXJsqrIo
    https://medium.com/@cvallejo/autenticaci%C3%B3n-y-manejo-de-roles-de-usuarios-en-laravel-7-50aa79fa1bed
    */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        $user_role_slug=auth()->user()->roles()->first()->slug;
        if ($user_role_slug=='admin') {
            return redirect('/admin') ;
        }elseif ($user_role_slug=='padre') {
           return 'familiares';
        }elseif ($user_role_slug=='profe') {
           return 'profesorado';
        }
        return $user->roles()->first()->slug;
        
    }
}
