<?php

namespace convenios\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ResTecnicaController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = DB::table('PROGRAMAS')->get();
        return view('EncPrograma.ResTecnica',['results'=>$results]);
    }
}