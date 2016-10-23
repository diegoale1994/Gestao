<?php


if($_SERVER["REQUEST_METHOD"]=='POST'){

require_once('base.php');

$codigo = $_POST['codigo'];
$correo = $_POST['correo'];

$query = "UPDATE persona SET remember_token= NULL WHERE email='$correo' AND remember_token='$codigo'";

$final = mysqli_query($con, $query);
if(mysqli_affected_rows($con)==0){
    echo 'El codigo ingresado no es correcto'.'0';
 }else{
    echo 'Acceso recuperado'.'1';
 }

	mysqli_close($con);
	
}

