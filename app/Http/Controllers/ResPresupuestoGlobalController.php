<?php

namespace convenios\Http\Controllers;

use Illuminate\Http\Request;

class ResPresupuestoGlobalController extends Controller
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
        return view('EncPresupuesto.ResPresupuestoGlobal');
    }
}
