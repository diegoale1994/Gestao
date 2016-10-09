<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
   
$id_persona = $_POST["id_persona"];
$rol = $_POST["rol"];

   require_once('base.php');
if($rol == "D"){
    $statement = mysqli_prepare($con, "SELECT nombre1, IFNULL(nombre2,''), apellido1, IFNULL(apellido2,''),email,IF(telefono<> '',telefono,''),IF(codigo <> '',codigo,''),IF(facebook <> '',facebook,''),IF(twiter <> '',twiter,''),IF(descripcion <> '',descripcion,'') FROM persona JOIN docente ON id = persona_id  WHERE id = ?");
    mysqli_stmt_bind_param($statement, "i", $id_persona);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $nombre1, $nombre2,$apellido1,$apellido2,$email,$telefono,$codigo,$facebook,$twitter,$descripcion);

    $response = array();
    
    while(mysqli_stmt_fetch($statement)){
        $response[] = array("nombre1"=>$nombre1,"nombre2"=>$nombre2,"apellido1"=>$apellido1,"apellido2"=>$apellido2,"email"=>$email,"telefono"=>$telefono,"codigo"=>$codigo,"facebook"=>$facebook,"twitter"=>$twitter,"descripcion"=>$descripcion);
    }


}elseif($rol == "E"){
    $statement = mysqli_prepare($con, "SELECT nombre1, IFNULL(nombre2,''), apellido1, IFNULL(apellido2,''),email,IF(telefono<> '',telefono,''),IF(codigo <> '',codigo,''),IF(semestre <> '',semestre,'') FROM persona JOIN estudiante ON id = persona_id  WHERE id = ?");
    mysqli_stmt_bind_param($statement, "i", $id_persona);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $nombre1, $nombre2,$apellido1,$apellido2,$email,$telefono,$codigo,$semestre);
    $response = array();
    
    while(mysqli_stmt_fetch($statement)){
        $response[] = array("nombre1"=>$nombre1,"nombre2"=>$nombre2,"apellido1"=>$apellido1,"apellido2"=>$apellido2,"email"=>$email,"telefono"=>$telefono,"codigo"=>$codigo,"semestre"=>$semestre);
    }
}    
    
    
    echo json_encode(array('response'=>$response));
}
?>