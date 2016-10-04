<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
   
$id_persona = $_POST["id_persona"];

   require_once('base.php');

    $statement = mysqli_prepare($con, "SELECT id_clase, nombre FROM estudiante_clase JOIN clase ON id_clase=id WHERE id_persona = ?");
    mysqli_stmt_bind_param($statement, "i", $id_persona);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $id_clase, $nombre);
    
    $response = array();
    
    while(mysqli_stmt_fetch($statement)){
        $response[$id_clase] = $nombre;
    }
    
    echo json_encode($response);
}
?>