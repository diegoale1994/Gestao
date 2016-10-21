<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
   
$id_persona = $_POST["id_profesor"];
   require_once('base.php');
    $statement = mysqli_prepare($con, "SELECT nombre1 , nombre2 , apellido1, apellido2, email, telefono, codigo, facebook, twiter, foto, descripcion FROM persona JOIN docente ON id=persona_id WHERE id = ?");
     mysqli_stmt_bind_param($statement, "s", $id_persona);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $nombre1, $nombre2, $apellido1, $apellido2,$email,$telefono,$codigo,$facebook,$twiter,$foto,$descripcion);
    
    $response = array();
    
    while(mysqli_stmt_fetch($statement)){
        if($nombre2==null){
            $nombre2 = "";
        }if($apellido2==null){
            $apellido2 = "";
        }if($telefono==null){
            $telefono = "";
        }if($codigo==null){
            $codigo = "";
        }if($facebook==null){
            $facebook = "";
        }if($twiter==null){
            $twiter = "";
        }if($foto==null){
            $foto = "";
        }if($descripcion==null){
            $descripcion = "";
        }
        $response[] = array("nombre1"=>$nombre1,"nombre2"=>$nombre2,"apellido1"=>$apellido1,"apellido2"=>$apellido2,"email"=>$email,"telefono"=>$telefono,"codigo"=>$codigo,"facebook"=>$facebook,"twiter"=>$twiter,"foto"=>$foto,"descripcion"=>$descripcion);
    }


   echo json_encode(array('response'=>$response));
}
?>
