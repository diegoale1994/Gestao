<?php


if($_SERVER["REQUEST_METHOD"]=='POST'){

require_once('base.php');

	$id_persona = $_POST['id_persona'];
	$rol = $_POST['rol'];
	$clase=$_POST['id_clase'];

	if($rol == "D"){
		$query = "UPDATE clase SET id_docente= NULL WHERE id='$clase' ";
	}elseif($rol=="E"){
		$query = "DELETE FROM estudiante_clase WHERE id_persona='$id_persona' AND id_clase='$clase' ";
	}
	
	$final = mysqli_query($con, $query);
	if(!$final){
        echo 'No se pudo lograr la desvinculacion de clase';
    }else{
    	 echo 'Has quedado desvinculado de esta clase';
    }

	mysqli_close($con);
	
}






?>