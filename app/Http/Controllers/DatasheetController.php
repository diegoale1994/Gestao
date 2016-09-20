<?php

namespace Gestao\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gestao\Http\Requests;
use Gestao\Http\Controllers\Controller;

class DatasheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($fecha_inicio=null,$fecha_final=null)
    {
       $dia=true;
        //return $fecha_inicio." ".$fecha_final;
        if($fecha_inicio == NULL and $fecha_final==NULL){
            $dia=true;
            $fecha = date("Y/m/d"); 
            $fecha = str_replace("/","-",$fecha);
            $clases_today = DB::table('clase_aula_horario')->join('clase', 'clase_aula_horario.id_clase', '=', 'clase.id')->join('aula', 'clase_aula_horario.id_aula', '=', 'aula.id')->select('clase_aula_horario.*', 'clase.nombre', 'aula.id')->where('fecha', '=', date("Y/m/d"))->get();
            return view('admin.index',compact('clases_today', 'aulas_names', 'fecha','dia' ));
        }
        else{
            $dia=false;
            $fecha= "2016-09-19";
            $aula=1;
            $clases_today = DB::table('clase_aula_horario')->join('clase', 'clase_aula_horario.id_clase', '=', 'clase.id')->join('aula', 'clase_aula_horario.id_aula', '=', 'aula.id')->select('clase_aula_horario.*', 'clase.nombre', 'aula.id')->where('fecha', '>=', $fecha)->where('fecha','<',date ("Y-m-d", strtotime("+6 day", strtotime($fecha))))->where('id_aula','=',$aula)->get();
             return view('admin.index',compact('clases_today','aula', 'fecha','dia' ));
        }
   
 // return view('admin.index');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
