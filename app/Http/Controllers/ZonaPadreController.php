<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZonaPadreController extends Controller
{
    public function index()
    {
        return view("familia");
    }
}
