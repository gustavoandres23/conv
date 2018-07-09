<?php

namespace convenios\Http\Controllers;

use Illuminate\Http\Request;

class ProgramasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

	
    public function index()
    {
    	return view('CrearPrograma');
    }
	public function store(Request $request)
    {
    	       $name= 'test programa';
		       $tipo= '1';
		       $dep = '2';
             DB::table('ADTEST.PROGRAMAS')->insert(
            [
                [
                    'NOM_PROGRAMA' => $name,
                    'TIPO_PROGRAMA' => $tipo,
                    'DEP_PROGRAMA' => $dep
                ]
                
            ]

            );
             return 'grabado';
	}
}
