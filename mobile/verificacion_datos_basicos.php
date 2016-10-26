<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
   
$id_persona = $_POST["id_persona"];
$rol = $_POST["rol"];

   require_once('base.php');
if($rol == "D"){
    $statement= mysqli_prepare($con, "SELECT estado FROM persona WHERE id =?");
    mysqli_stmt_bind_param($statement, "i", $id_persona);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $estado);
    $response = array();
    
    while(mysqli_stmt_fetch($statement)){
        $response[] = array("estado"=>$estado);
    }

    if($response[0]["estado"] == "A"){


    $statement = mysqli_prepare($con, "SELECT count(*) FROM persona JOIN docente ON id = persona_id  WHERE id = ? AND nombre1 <> '' AND apellido1 <> '' AND email <> '' AND telefono <> '' AND descripcion <> ''");
    mysqli_stmt_bind_param($statement, "i", $id_persona);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $permiso);

    $response = array();
    
    while(mysqli_stmt_fetch($statement)){
        $response[] = array("permiso"=>$permiso);
    }
         echo json_encode(array('response'=>$response));
     }
    else{
         echo json_encode(array('response'=>$response));
    }
}

elseif($rol == "E"){
    $statement = mysqli_prepare($con, "SELECT count(*) FROM persona JOIN estudiante ON id = persona_id  WHERE id = ? AND nombre1 <> '' AND apellido1 <> '' AND email <> '' AND telefono <> '' ");
    mysqli_stmt_bind_param($statement, "i", $id_persona);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $permiso);
    $response = array();
    
    while(mysqli_stmt_fetch($statement)){
        $response[] = array("permiso"=>$permiso);
    }
    echo json_encode(array('response'=>$response));
}    
    
    
    
}
?>