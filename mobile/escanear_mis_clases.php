<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
    $persona = $_POST["persona"];
require_once('base.php');
   global $con;
   date_default_timezone_set('America/Bogota');



      $fecha_hoy = date('Y/m/d');
    //$fecha_hoy = '2016/10/24';
   $hora_actual = date("G");
//$hora_actual=7;
     $query = "SELECT clase_aula_horario.id_clase id, hora_inicio, hora_final, aula.nombre, observaciones from clase_aula_horario, estudiante_clase, aula where clase_aula_horario.id_clase=estudiante_clase.id_clase and estudiante_clase.id_persona=$persona and aula.id = clase_aula_horario.id_aula and fecha = '$fecha_hoy' and hora_final > $hora_actual ORDER by hora_inicio desc limit 1";
     $result = mysqli_query($con, $query);
    $number_of_rows = mysqli_num_rows($result);
    $response  = array();

    $response1 = array("estado"=>"incorrecto");
    if($number_of_rows > 0) {
       $response1 = array("estado"=>"correcto");
        while ($row = mysqli_fetch_assoc($result)) {
            $response[] = $row;
           
        }
    }

echo json_encode(array('response'=>$response));

  }
    ?>