<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
   
   require_once('base.php');

    $statement = mysqli_prepare($con, "SELECT id, nombre FROM aula");
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $id, $nombre);
    
    $response = array();
    
    while(mysqli_stmt_fetch($statement)){
        $response[] = array("id"=>$id,"nombre"=>$nombre);
    }
    
    echo json_encode(array('response'=>$response));
}
?>