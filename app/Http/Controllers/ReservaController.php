<?php

namespace Gestao\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Gestao\Http\Requests;
use Gestao\Http\Controllers\Controller;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reserva_clase($clase, $hora_inicio, $fecha){
  $fecha = str_replace("-","/",$fecha);
  echo $fecha;
        $clases_sin_asignar = DB::table('clase_aula_horario')->join('clase', 'clase_aula_horario.id_clase', '=', 'clase.id')->select('clase_aula_horario.*', 'clase.nombre')->where('fecha', '=', $fecha)->get();
        //return view('reserva.index');
    }
}
