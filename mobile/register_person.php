<?php


if($_SERVER["REQUEST_METHOD"]=='POST'){

require_once('base.php');

	createPerson();


}


function createPerson(){
	global $con;
	$nombre1 = $_POST['nombre1'];
	$apellido1 = $_POST['apellido1'];
	$password = $_POST['password'];
$options = [
  'cost' => 10
];
$password = password_hash($password, PASSWORD_BCRYPT, $options);

	$correo = $_POST['correo'];
	$rol = $_POST['rol'];
	//$programa = $_POST['programa'];

	$query = "INSERT INTO persona(nombre1, apellido1, email, password, rol, programa_id) VALUES ('$nombre1','$apellido1','$correo','$password','$rol', '1')";

	mysqli_query($con, $query) or die (mysqli_error($con));
	mysqli_close($con);
}






?>