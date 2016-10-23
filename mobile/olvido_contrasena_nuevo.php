<?php


if($_SERVER["REQUEST_METHOD"]=='POST'){

require_once('base.php');

$correo = $_POST['correo'];
$contrasena = sha1($_POST['contrasena']);

$query = "UPDATE persona SET password='$contrasena' WHERE email='$correo' ";

$final = mysqli_query($con, $query);
echo 'Contraseña actualizada';

	mysqli_close($con);
	
}