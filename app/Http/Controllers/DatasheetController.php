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


    public function index($tipo_mostrar=null,$dia_semana=null,$no_sala=null,$no_semana=null)
    {
       $dia=true;
        if($tipo_mostrar == NULL){
            $dia=true;
            $fecha = date("Y-m-d"); 
            $clases_today = DB::table('clase_aula_horario')->join('clase', 'clase_aula_horario.id_clase', '=', 'clase.id')->join('aula', 'clase_aula_horario.id_aula', '=', 'aula.id')->select('clase_aula_horario.*', 'clase.nombre', 'aula.id')->where('fecha', '=', $fecha)->get();
            return view('admin.index',compact('clases_today', 'aulas_names', 'fecha','dia' ));
        }
        elseif($tipo_mostrar==0){
            $dia=true;
            $diaSemanaActual= ((getDate(time())['wday'])+6)%7;
            $diferenciaDias=$diaSemanaActual - $dia_semana;
            $fecha = date ("Y-m-d", strtotime("-".$diferenciaDias." day", strtotime("now")));
            $clases_today = DB::table('clase_aula_horario')->join('clase', 'clase_aula_horario.id_clase', '=', 'clase.id')->join('aula', 'clase_aula_horario.id_aula', '=', 'aula.id')->select('clase_aula_horario.*', 'clase.nombre', 'aula.id')->where('fecha', '=', $fecha)->get();
            return view('admin.index',compact('clases_today', 'aulas_names', 'fecha','dia' ));

        }else{

            $dia=false;
            $fecha= $no_semana;
            $aula=$no_sala;
            $clases_today = DB::table('clase_aula_horario')->join('clase', 'clase_aula_horario.id_clase', '=', 'clase.id')->join('aula', 'clase_aula_horario.id_aula', '=', 'aula.id')->select('clase_aula_horario.*', 'clase.nombre', 'aula.id')->where('fecha', '>=', $fecha)->where('fecha','<',date ("Y-m-d", strtotime("+6 day", strtotime($fecha))))->where('id_aula','=',$aula)->get();
             return view('admin.index',compact('clases_today','aula', 'fecha','dia' ));
        }
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
