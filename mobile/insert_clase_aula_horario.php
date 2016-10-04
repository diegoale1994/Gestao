<?php


if($_SERVER["REQUEST_METHOD"]=='POST'){

require_once('base.php');

	createPerson();


}


function createPerson(){
	global $con;
	$nombre1 = $_POST['nombre1'];
	$apellido1 = $_POST['apellido1'];
	$password = sha1($_POST['password']);


	$correo = $_POST['correo'];
	$rol = $_POST['rol'];
	//$programa = $_POST['programa'];
 
	$query = "INSERT INTO persona(nombre1, apellido1, email, password, rol, programa_id) VALUES ('$nombre1','$apellido1','$correo','$password','$rol', '1')";
	
	$final = mysqli_query($con, $query);
	if(!$final){
        echo 'tu email ya esta registrado';
    }else{
    	 echo 'Registro Exitoso';
    }

	mysqli_close($con);
	
}






?>