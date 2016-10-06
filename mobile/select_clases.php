<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
   
$id_persona = $_POST["id_persona"];

   require_once('base.php');

    $statement = mysqli_prepare($con, "SELECT id, nombre FROM clase  WHERE id_docente = ?");
    mysqli_stmt_bind_param($statement, "i", $id_persona);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $id_clase, $nombre);
    
    $response = array();
    
    while(mysqli_stmt_fetch($statement)){
        $response[] = array("id_clase"=>$id_clase,"nombre"=>$nombre);
    }
    
    echo json_encode(array('response'=>$response));
}
?>