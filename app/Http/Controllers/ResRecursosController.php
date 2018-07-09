<?php

namespace convenios\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ResRecursosController extends Controller
{
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
        $results=DB::table('PROGRAMAS')->get();
        return view('EncPrograma.ResRecursos',['results'=>$results]);
    }
}
