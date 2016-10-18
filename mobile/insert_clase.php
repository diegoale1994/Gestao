<?php


if($_SERVER["REQUEST_METHOD"]=='POST'){

require_once('base.php');
$id_clase = $_POST['id_clase'];
$id_persona = $_POST['id_persona'];
$codigo = $_POST['id_clase'];
$nombre = $_POST['nombre_clase'];
$grupo =$_POST['grupo'];
$creditos =$_POST['creditos'];
$semestre =$_POST['semestre'];
$cantidadEstudiantes =$_POST['cantidad_estudiantes'];
$requerimientos =$_POST['requerimientos'];

		$query = "INSERT INTO clase(id,nombre,grupo,creditos,id_docente,semestre,cant_estudiantes,requerimientos) VALUES ('$id_clase','$nombre','$grupo','$creditos','$id_persona','$semestre','$cantidadEstudiantes','$requerimientos')";

	$final = mysqli_query($con, $query);
	if(!$final){
        echo 'No se pudo lograr la creacion de clase';
    }else{
    	 echo 'Clase creada correctamente ';
    }


require_once('insert_clase_aula_horario.php');

}
?>