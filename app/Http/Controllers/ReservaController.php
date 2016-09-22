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
    public function reserva_clase($aula, $hora_inicio, $fecha, $uri_anterior){
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

$clase_sin_aula= DB::table('clase_aula_horario')->join('clase', 'clase_aula_horario.id_clase', '=', 'clase.id')->select('clase_aula_horario.*', 'clase.nombre', 'clase.id')->where('fecha', '=', $fecha)->where('hora_inicio', '=', $hora_inicio)->where('id_aula', '=', NULL)->get();

return view('reserva.index', compact('clase_sin_aula','fecha','aula','hora_inicio','uri_anterior'));

}








    public function desreserva_clase($hora_inicio, $fecha, $id_clase,$uri_anterior){
     $fecha = str_replace("-","/",$fecha);
       $uri_anterior = str_replace("-","/",$uri_anterior);

         DB::update("UPDATE clase_aula_horario 
                         SET id_aula='NULL'
                         where id_clase= '".$id_clase."' and fecha='".$fecha."' and hora_inicio='".$hora_inicio."'");
                         $uri_anterior_a= substr($uri_anterior, 0, - 10);
                        
                        $fecha_n = str_replace("/","-",substr($uri_anterior,- 10));
          


        return redirect($uri_anterior_a.$fecha_n);
    }

public function store(Request $request)
    {
         $uri_anterior= $request['uri'];
        $aula = $request['aula'];
        $fecha = $request['fecha'];
          $clase = $request['clase'];
            $hora_inicio = $request['hora_inicio'];
          $fecha_n = str_replace("/","-",$fecha);
        
         DB::update("UPDATE clase_aula_horario 
                         SET id_aula='$aula' where fecha = '".$fecha."' and id_clase ='".$clase."' and hora_inicio='".$hora_inicio."'");
         $uri_anterior = substr($uri_anterior, 0, - 10);
        return redirect($uri_anterior.$fecha_n);

        }
 
    
}
