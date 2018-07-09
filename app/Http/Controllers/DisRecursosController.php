<?php

namespace convenios\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DisRecursosController extends Controller
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
        $results = DB::table('PROGRAMAS')->get();
        return view('EncPrograma.DistribucionRecursos',['results'=>$results]);
    }

    public function postDis(Request $request)
    {
        $programa= $request->input('programa');
        $results = DB::table('PROGRAMAS')->where('COD_PROGRAMA','=',$programa)->get();
        return view('EncPrograma.DistribucionRecursosComuna',['results'=>$results]);
    }

    public function postDisCom(Request $request, $id)
    {
        $cod_programa=$id;
        //$input = $request->all();
        $countRequest = count($request->all());
        $rows = ($countRequest-1)/3;

        //***** HAY Q VALIDAR SI EXISTE DICHA FILA PARA NO PERDER EL VALOR DEL INPUT EN CASO DE QUITAR POR JAVASCRITS
/*
        for ($i=1; $i <=$rows ; $i++) { 
               $data = array(
                    'COD_DIST'=> 1, 'MONTO'=> 12
        )
               DB::table('ADTEST.DISTRIBUCION')->insert($data);
        }*/

            //$seqval = DB::table('DUAL')->select("ADTEST.SEQ_DISTRIBUCION_CONV.NEXTVAL")->get();
            //DB::table('DUAL')->select('SEQ_DISTRIBUCION_CONV.NEXTVAL')->get(),
        for ($i=1; $i <= $rows ; $i++)
        {
            $results = DB::select('select SEQ_DISTRIBUCION_CONV.NEXTVAL from dual');
            foreach ($results as $object) {

                DB::table('DISTRIBUCION')->insert
                (
                [
                    [
                        'COD_DIST' => $object->nextval,
                        'COD_ESTABL' => $request->input('comuna1'),
                        'COD_PROGRAMA' => $cod_programa,
                        'PERIODO_DIST' => date("Y/m/d H:i:s"),
                        'MONTO' => $request->input('monto1')
                    ]
                ]
                );
            }
        }
        
        return "guardado exitosamente con el ID: ".$object->nextval;
    }
}
