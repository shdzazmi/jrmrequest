<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $sqlconnect = odbc_connect("JRMDB", "sa", "acuan");
        $sqlquery = "select * from bank;";
        $process =odbc_exec($sqlconnect, $sqlquery);
        odbc_result($process,'bank');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
