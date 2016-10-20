<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
    $estado = $_POST["estado"];
require_once('base.php');
   global $con;
   date_default_timezone_set('America/Bogota');



if ($estado==0) {
    $response  = array();
    $fecha_hoy = date('Y/m/d');
     $minuto_actual = date("i");
    //$hora_actual = date("G");
     $hora_actual="8";
    $response  = array();

     $day = array("Domingo,", "Lunes,", "Martes,", "Miércoles,", "Jueves,", "Viernes," ,"Sábado,");
    $month = array("","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
   
    $fecha_reg = date("d", strtotime($fecha_hoy))." de ".$month[date('n', strtotime($fecha_hoy))];
    
    $response[] = array("fecha"=>$fecha_reg,"hora"=>$hora_actual,"minuto"=>$minuto_actual);


echo json_encode(array('response'=>$response));
}
if ($estado==1) {
      // $fecha_hoy = date('Y/m/d');
    $fecha_hoy = "2016/10/24";
    //$hora_actual = date("G");
$hora_actual='8';
    $aula = $_POST["aula"];
     $query = "SELECT clase_aula_horario.* ,clase.grupo, clase.nombre, aula.id, null as nombre1 ,null as apellido1 FROM clase_aula_horario JOIN clase ON clase_aula_horario.id_clase = clase.id JOIN aula ON clase_aula_horario.id_aula = aula.id WHERE fecha = '$fecha_hoy' and hora_final > $hora_actual and id_aula = $aula and id_docente IS NULL UNION SELECT clase_aula_horario.* ,clase.grupo, clase.nombre, aula.id, persona.nombre1 ,persona.apellido1 FROM clase_aula_horario JOIN clase ON clase_aula_horario.id_clase = clase.id JOIN aula ON clase_aula_horario.id_aula = aula.id JOIN persona ON clase.id_docente = persona.id WHERE fecha = '$fecha_hoy' and hora_final > $hora_actual  and id_aula = $aula Order by hora_inicio desc";
     $result = mysqli_query($con, $query);
    $number_of_rows = mysqli_num_rows($result);
    $response  = array();
    
    if($number_of_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response[] = $row;
        }
    }

echo json_encode(array('response'=>$response));
}
  }
    ?>