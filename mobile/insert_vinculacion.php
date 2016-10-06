<?php


if($_SERVER["REQUEST_METHOD"]=='POST'){

require_once('base.php');

	$id_persona = $_POST['id_persona'];
	$id_clase = $_POST['id_clase'];
	$rol = $_POST['rol'];
	if($rol == "D"){
		$query = "UPDATE clase SET id_docente='$id_persona' WHERE id='$id_clase' ";
	}elseif($rol=="E"){
		$query = "INSERT INTO estudiante_clase(id_persona,id_clase) VALUES ('$id_persona','$id_clase')";
	}
	
	$final = mysqli_query($con, $query);
	if(!$final){
        echo 'No se pudo lograr la vinculación';
    }else{
    	 echo 'Vinculación exitosa';
    }

	mysqli_close($con);
	
}






?>