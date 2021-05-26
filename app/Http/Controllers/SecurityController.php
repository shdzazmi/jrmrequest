<?php

namespace App\Http\Controllers;

use Flash;

class SecurityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //Initialize data
        return view('security.index');
    }
}
