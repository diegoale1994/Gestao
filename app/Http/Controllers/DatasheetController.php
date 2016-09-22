<?php

namespace Gestao\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gestao\Http\Requests;
use Gestao\Constante;
use Gestao\Http\Controllers\Controller;
use Session;
class DatasheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index($tipo_mostrar=null,$aula_semana=null,$fecha_dia=null)
    {
       $finSemestre=Constante::where('id','=','FINSEM')->first();
       $finSemestre=$finSemestre -> valor;

       $inicioSemestre=Constante::where('id','=','INISEM')->first();
       $inicioSemestre=$inicioSemestre -> valor;

       $dia=true;
        if($tipo_mostrar == NULL){
            $dia=true;
            $fecha = date("Y-m-d"); 
            $nombre_dia = obtenernombre($fecha);
            $clases_sin_profe = DB::table('clase_aula_horario')->join('clase', 'clase_aula_horario.id_clase', '=', 'clase.id')->join('aula', 'clase_aula_horario.id_aula', '=', 'aula.id')->select(
DB::raw('clase_aula_horario.*,clase.grupo, clase.nombre, aula.id,null as nombre1,null as apellido1'))->where('fecha', '=', $fecha)->whereNull('id_docente');
            $clases_today = DB::table('clase_aula_horario')->join('clase', 'clase_aula_horario.id_clase', '=', 'clase.id')->join('aula', 'clase_aula_horario.id_aula', '=', 'aula.id')->join('persona', 'clase.id_docente', '=', 'persona.id')->select('clase_aula_horario.*','clase.grupo', 'clase.nombre', 'aula.id','persona.nombre1','persona.apellido1')->where('fecha', '=', $fecha)->union($clases_sin_profe)->get();
            
       return view('admin.index',compact('clases_today', 'aulas_names', 'fecha','dia','nombre_dia','finSemestre','inicioSemestre' ));
        }
        elseif($tipo_mostrar==0){
            $dia=true;
            $fecha = date ("Y-m-d", strtotime("+".$aula_semana." day", strtotime($fecha_dia)));
            $nombre_dia = obtenernombre($fecha);

            $clases_sin_profe = DB::table('clase_aula_horario')->join('clase', 'clase_aula_horario.id_clase', '=', 'clase.id')->join('aula', 'clase_aula_horario.id_aula', '=', 'aula.id')->select(DB::raw('clase_aula_horario.*, clase.nombre,clase.grupo, aula.id,null as nombre1,null as apellido1'))->where('fecha', '=', $fecha)->whereNull('id_docente');
            $clases_today = DB::table('clase_aula_horario')->join('clase', 'clase_aula_horario.id_clase', '=', 'clase.id')->join('aula', 'clase_aula_horario.id_aula', '=', 'aula.id')->join('persona', 'clase.id_docente', '=', 'persona.id')->select('clase_aula_horario.*', 'clase.grupo','clase.nombre', 'aula.id','persona.nombre1','persona.apellido1')->where('fecha', '=', $fecha)->union($clases_sin_profe)->get();
            $semana=$fecha_dia;
            $diaSemana=$aula_semana;
            return view('admin.index',compact('clases_today', 'aulas_names', 'fecha','dia','nombre_dia','tipo_mostrar','finSemestre','inicioSemestre','semana','diaSemana' ));
        }else{

            $dia=false;
            $fecha= $fecha_dia;
            $aula=$aula_semana;

                $nombre_dia1 = obtenernombre($fecha);
                $nombre_dia2 = date ("Y-m-d", strtotime("+7 day", strtotime($fecha)));
                $nombre_dia2 =obtenernombre($nombre_dia2);


            $clases_today = DB::table('clase_aula_horario')->join('clase', 'clase_aula_horario.id_clase', '=', 'clase.id')->join('aula', 'clase_aula_horario.id_aula', '=', 'aula.id')->select('clase_aula_horario.*', 'clase.nombre', 'aula.id')->where('fecha', '>=', $fecha)->where('fecha','<',date ("Y-m-d", strtotime("+7 day", strtotime($fecha))))->where('id_aula','=',$aula)->get();
            $semana=$fecha;
            $numeroSala=$aula;
             return view('admin.index',compact('clases_today','aula', 'fecha','dia','nombre_dia1','nombre_dia2','aula','tipo_mostrar','finSemestre','inicioSemestre','semana','numeroSala' ));
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
function obtenernombre($dia){



    $day = array("Domingo,", "Lunes,", "Martes,", "Miércoles,", "Jueves,", "Viernes," ,"Sábado,");
    $month = array("","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    date_default_timezone_set("America/Bogota");
    $fecha_reg = $day[date('w', strtotime($dia))].date(" d", strtotime($dia))." de ".$month[date('n', strtotime($dia))]." de ".date("Y", strtotime($dia));
    return $fecha_reg;
}