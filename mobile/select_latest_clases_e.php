<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id_persona = $_POST["id_profesor"];
require_once('base.php');
   global $con;
   date_default_timezone_set('America/Bogota');
$fecha_hoy = date('Y/m/d');

$fecha_final = strtotime($fecha_hoy."+ 8 days");
$fecha_final = date("Y/m/d",$fecha_final);


    $query = "SELECT hora_inicio, hora_final, clase.nombre nombre_clase, aula.nombre nombre_aula, fecha from clase_aula_horario, clase, aula where aula.id = clase_aula_horario.id_aula and clase.id = clase_aula_horario.id_clase and fecha >= '$fecha_hoy' and fecha <= '$fecha_final' and clase.id_docente = $id_persona order by fecha asc LIMIT 3";
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
    ?>