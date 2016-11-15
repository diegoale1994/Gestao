<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
   
$id_persona = $_POST["id_persona"];
$fecha = $_POST["fecha"];
$rol= $_POST["rol"];


   require_once('base.php');

if($rol=="D"){
    $statement = mysqli_prepare($con,"SELECT clase.id,fecha,clase.nombre,IFNULL(grupo,'Sin grupo'),hora_inicio,hora_final,IFNULL(observaciones,'Sin observaciones'),IFNULL(aula.nombre,'Sin aula asignada'),IF(id_docente=NULL,'Sin docente asignado',CONCAT(persona.nombre1,' ',persona.apellido1)) FROM clase JOIN clase_aula_horario ON id_clase=clase.id LEFT JOIN aula ON ((id_aula=aula.id)OR(id_aula=NULL)) LEFT JOIN persona ON ((id_docente=persona.id)OR(id_docente=NULL)) WHERE id_docente=? AND fecha=? ");
}else{
    $statement = mysqli_prepare($con,"SELECT clase.id,fecha,clase.nombre,IFNULL(grupo,'Sin grupo'),hora_inicio,hora_final,IFNULL(observaciones,'Sin observaciones'),IFNULL(aula.nombre,'Sin aula asignada'),IF(id_docente=NULL,'Sin docente asignado',CONCAT(persona.nombre1,' ',persona.apellido1)) FROM clase JOIN clase_aula_horario ON clase_aula_horario.id_clase=clase.id LEFT JOIN aula ON ((id_aula=aula.id)OR(id_aula=NULL)) JOIN estudiante_clase ON ((estudiante_clase.id_persona= ? ) AND (estudiante_clase.id_clase=clase_aula_horario.id_clase)) LEFT JOIN persona ON ((id_docente=persona.id)OR(id_docente=NULL)) WHERE fecha= ? ");
}
    mysqli_stmt_bind_param($statement, "is", $id_persona,$fecha);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $claseId,$fecha,$clase_nombre,$grupo,$hora_inicio,$hora_final,$observaciones,$aula_nombre,$docente);
    
    $response = array();
    
    while(mysqli_stmt_fetch($statement)){
        $response[] = array("clase_id"=>$claseId,"fecha"=>$fecha,"clase"=>$clase_nombre,"grupo"=>$grupo,"hora_inicio"=>$hora_inicio,"hora_final"=>$hora_final,"observaciones"=>$observaciones,"aula"=>$aula_nombre,"docente"=>$docente);
    }
    
    echo json_encode(array('response'=>$response));
}
?>