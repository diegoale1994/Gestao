

<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST["id"];
require_once('base.php');
   global $con;


    $query = "SELECT null as nombre1, null as apellido1, nombre materia from clase, persona where clase.id='$id' and id_docente is null union SELECT nombre1, apellido1, nombre materia from clase, persona where clase.id='$id' and clase.id_docente=persona.id";
    $result = mysqli_query($con, $query);
    $number_of_rows = mysqli_num_rows($result);
    $response  = array();
    
    if($number_of_rows >= 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response[] = $row;
        }
    }
echo json_encode(array('response'=>$response));
 }
    ?>