<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;

class HomeController extends Controller
{
    
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
            return redirect('/familia');
        }elseif ($user_role_slug=='profe') {
           return redirect('/profesorado');
        }
        return $user->roles()->first()->slug;
        
    }
}
