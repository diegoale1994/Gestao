<?php

namespace Gestao\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Gestao\Http\Requests;
use Gestao\Http\Controllers\Controller;
use Gestao\Clase;
use Gestao\ClaseAulaHorario;
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
echo $cont;
$clase_sin_aula =DB::select("SELECT nombre, clase_aula_horario.*, id from clase_aula_horario, clase Where clase.id=clase_aula_horario.id_clase and fecha ='".$fecha."' and hora_inicio = '".$hora_inicio."' and id_aula is NULL and hora_final - hora_inicio <= ".$cont."");





return view('reserva.index', compact('clase_sin_aula','fecha','aula','hora_inicio','uri_anterior','cont'));

}








    public function desreserva_clase($hora_inicio, $fecha, $id_clase,$uri_anterior){
     $fecha = str_replace("-","/",$fecha);
       $uri_anterior = str_replace("-","/",$uri_anterior);

         DB::update("UPDATE clase_aula_horario 
                         SET id_aula=NULL
                         where id_clase= '".$id_clase."' and fecha='".$fecha."'");
                         $uri_anterior_a= substr($uri_anterior, 0, - 10);
                        
                        $fecha_n = str_replace("/","-",substr($uri_anterior,- 10));
          


        return redirect($uri_anterior_a.$fecha_n)->with('message',trans('messages.claseEliminadaCorrectamente'));
    }

public function store(Request $request)
    {
         $uri_anterior= $request['uri'];
        $aula = $request['aula'];
        $fecha = $request['fecha'];
          $clase = $request['clase'];
            $hora_inicio = $request['hora_inicio'];
         $uri_anterior = str_replace("-","/",$uri_anterior);
        $fecha_n = str_replace("/","-",substr($uri_anterior,- 10));
         DB::update("UPDATE clase_aula_horario 
                         SET id_aula='$aula' where fecha = '".$fecha."' and id_clase ='".$clase."' and hora_inicio='".$hora_inicio."'");
         $uri_anterior = substr($uri_anterior, 0, - 10);

$tokens = array();
             $profesor_token = DB::table('persona')->select('cell_token')->join('clase_aula_horario','clase_aula_horario.id_persona','=','persona.id')->where('fecha', $fecha)->where('id_clase', $clase)->where('hora_inicio', $hora_inicio)->get();
     foreach ($profesor_token as $key) {
        $tokens[] = $key -> cell_token;
     }
    $message = array("message" => "Ocurrencia Aprobada!");
    $message_status = send_notification($tokens, $message);
        return redirect($uri_anterior.$fecha_n)->with('message',trans('messages.claseAsignadaCorrectamente'));

        }

        public function store2(Request $request)
    {
        $fecha= $request['fecha'];
        $fecha = str_replace("-","/",$fecha);
        $uri_anterior= $request['uri'];
        $uri_anterior = str_replace("-","/",$uri_anterior);
$fecha_n = str_replace("/","-",substr($uri_anterior,- 10));
 $uri_anterior = substr($uri_anterior, 0, - 10);
    clase::create([
        'id' => $request['id'],
        'nombre' => $request['nombre'],
        'grupo' => $request['grupo'],
        'creditos' => $request['creditos'],
        'semestre' => $request['semestre'],
        'cant_estudiantes' => $request['cant_estudiantes'],
        'requerimientos' => $request['requerimientos'],
]);
     claseaulahorario::create([
        'id_clase' => $request['id'],
        'id_aula' => $request['aula'],
        'hora_inicio' => $request['horaInicio'],
        'hora_final' => $request['horaFinal'],
        'fecha' => $request['fecha'],
        
]);

return redirect($uri_anterior.$fecha_n)->with('message',trans('messages.claseAsignadaYCreadaCorrectamente'));

        }
 
    
}
 function send_notification ($tokens, $message)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = array(
             'registration_ids' => $tokens,
             'data' => $message
            );
        $headers = array(
            'Authorization:key = AIzaSyBx4558ic1QeIaDgi3_ShbT_M7HtgkPMs8',
            'Content-Type: application/json'
            );
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       return $result;
    }