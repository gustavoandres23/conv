<?php

namespace convenios\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class test extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$users = DB::table('ADTEST.CONVTEST')->get();    
        return view('viewTable', ['users' => $users]);

        $pathToFile=public_path().'\storage\conv1.pdf';
        */
/*
        return response()->file($pathToFile);
        return response()->file($pathToFile, $headers);
*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name= $request->input('name');
        $date= $request->input('date');
        //$date= date("Y/m/d");
        $new_date = date('Y/m/d', strtotime($date));

        
        //$dateNew = date('d/m/Y H:i:s', $date);

        //$date = str_replace('-', '/', $dateold);


         $file= $request->file('file');

         $nombre = $file->getClientOriginalName();
         $ext = \File::extension($nombre);

         $rename = $name.'.'.$ext;


       \Storage::disk('local')->put($rename, \File::get($file));

            DB::table('ADTEST.CONVTEST')->insert(
            [
                [
                    'NAME' => $name,
                    'DATE' => $new_date
                ]
                
            ]

            );

         return $new_date;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $name = "/storage/".$id;
        $pathToFile=public_path().$name;
        return response()->file($pathToFile);
        return response()->file($pathToFile, $headers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
