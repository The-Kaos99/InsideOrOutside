<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view ("welcome");
    }

    public function primeros_pasos()
    {
        
        return view("primeros_pasos");
    }
}
