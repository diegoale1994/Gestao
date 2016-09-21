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
    public function reserva_clase($aula, $hora_inicio, $fecha){
  $fecha = str_replace("-","/",$fecha);
  echo "fecha-> ".$fecha." hora inicio -> ".$hora_inicio." aula ->".$aula;
        $clases_sin_asignar = DB::table('clase_aula_horario')->join('clase', 'clase_aula_horario.id_clase', '=', 'clase.id')->select('clase_aula_horario.*', 'clase.nombre')->where('fecha', '=', $fecha)->where('id_aula', '=', $aula)->get();
$hora_apta=array();
$cont=100;
$conti=0;
foreach ($clases_sin_asignar as $element) {
    
    if($element -> hora_inicio > $hora_inicio){
        $aux = $element -> hora_inicio - $hora_inicio;
        $conti++;
        if($aux < $cont){
        $cont = $aux;
        }

    }
}
if($conti==0){
    $cont =  22 - $hora_inicio ;
}
echo "estas son las horas maximas".$cont;

    }
    public function desreserva_clase($hora_inicio, $fecha, $id_clase,$uri_anterior){
     $fecha = str_replace("-","/",$fecha);
       $uri_anterior = str_replace("-","/",$uri_anterior);
         /*DB::update("UPDATE clase_aula_horario 
                         SET id_aula='NULL'
                         where id_clase= '".$id_clase."' and fecha='".$fecha."' and hora_inicio='".$hora_inicio."'");
         //return redirect('admin/algoritmo');
*/
        return redirect($uri_anterior);
    }
}
