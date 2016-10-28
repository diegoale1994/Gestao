<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
   
$id_aula = $_POST["id_aula"];
$fecha = $_POST["fecha"];


   require_once('base.php');

    $statement = mysqli_prepare($con,"SELECT fecha,clase.nombre,IFNULL(grupo,'Sin grupo'),hora_inicio,hora_final,IFNULL(observaciones,'Sin observaciones'),IF(id_docente=NULL,'Sin docente asignado',CONCAT(persona.nombre1,' ',persona.apellido1)) FROM clase JOIN clase_aula_horario ON id_clase=clase.id LEFT JOIN aula ON id_aula=aula.id LEFT JOIN persona ON ((id_docente=persona.id)OR(id_docente=NULL)) WHERE aula.id= ? AND fecha= ? ");

    mysqli_stmt_bind_param($statement, "is", $id_aula,$fecha);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $fecha,$clase_nombre,$grupo,$hora_inicio,$hora_final,$observaciones,$docente);
    
    $response = array();
    
    while(mysqli_stmt_fetch($statement)){
        $response[] = array("fecha"=>$fecha,"clase"=>$clase_nombre,"grupo"=>$grupo,"hora_inicio"=>$hora_inicio,"hora_final"=>$hora_final,"observaciones"=>$observaciones,"docente"=>$docente);
    }
    
    echo json_encode(array('response'=>$response));
}
?>