<?php

if($_SERVER["REQUEST_METHOD"]=='POST'){
require_once('base.php');



$email= $_POST['correo'];
	
	
	$codigo = sprintf('%04d', rand(0,9999));
	$query = "UPDATE persona SET remember_token ='$codigo' WHERE email='$email' ";

$from= "noresponder@gestaomobile.com";

$subject = 'Olvido contraseña - Gestao-mobile';
$message = '<html><body><h1>Olvido de contraseña a tu aplicacion Gestao-mobile</h1><br><br>';
$message .= 'Ingresa el siguiente codigo en la aplicacion para recuperar el acceso';
$message .= '<br><h3>'.$codigo.'</h3></body></html>';

$headers = "From: " . strip_tags($from) . "\r\n";
$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

mail($email, $subject, $message, $headers);


	
	$final = mysqli_query($con, $query);
	if(mysqli_affected_rows($con)==0){
        echo 'El correo no se encuentra registrado'.'0';
    }else{
    	 echo 'Revisa tu correo e ingresa el codigo proporcionado'.'1';
    }

	mysqli_close($con);
}	

?>