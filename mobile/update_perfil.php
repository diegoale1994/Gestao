<?php


if($_SERVER["REQUEST_METHOD"]=='POST'){

require_once('base.php');

	$id_persona = $_POST['id_persona'];
	$rol = $_POST['rol'];
	$nombre1=$_POST['nombre1'];
	$nombre2=$_POST['nombre2'];
	$apellido1=$_POST['apellido1'];
	$apellido2=$_POST['apellido2'];
	$email=$_POST['email'];
	$telefono=$_POST['telefono'];
	$codigo=$_POST['codigo'];
	$semestre=$_POST['semestre'];
	$facebook=$_POST['facebook'];
	$twitter=$_POST['twitter'];
	$descripcion=$_POST['descripcion'];




	if($rol == "D"){
		$query = "UPDATE persona,docente SET nombre1='$nombre1',nombre2='$nombre2',apellido1='$apellido1',apellido2='$apellido2',email='$email',telefono='$telefono',codigo='$codigo',facebook='$facebook',twiter='$twitter',descripcion='$descripcion' WHERE id=persona_id AND id='$id_persona' ";
	}elseif($rol=="E"){
		$query = "UPDATE persona,estudiante SET nombre1='$nombre1',nombre2='$nombre2',apellido1='$apellido1',apellido2='$apellido2',email='$email',telefono='$telefono',codigo='$codigo',semestre='$semestre' WHERE id=persona_id AND id='$id_persona' ";
	}
	
	$final = mysqli_query($con, $query);
	if(!$final){
        echo 'No se pudo lograr la actualización de datos';
    }else{
    	 echo 'Actualización de datos exitosa';
    }

	mysqli_close($con);
	
}






?>