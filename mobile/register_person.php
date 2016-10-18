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
 	if($rol == 'E'){
$query = "INSERT INTO persona(nombre1, apellido1, email, password, rol, programa_id, estado) VALUES ('$nombre1','$apellido1','$correo','$password','$rol', '1', 'A')";
 	}else{
 		$query = "INSERT INTO persona(nombre1, apellido1, email, password, rol, programa_id, estado) VALUES ('$nombre1','$apellido1','$correo','$password','$rol', '1','N')";
 	}
	
	$final = mysqli_query($con, $query);
	if(!$final){
        echo 'tu email ya esta registrado';
    }else{
    	$query = "SELECT id from persona where email = '$correo'";
    	$result = mysqli_query($con, $query);
    $number_of_rows = mysqli_num_rows($result);
    $response  = array();
    
    if($number_of_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
         
            $response[] = array("estado"=>"Registro Exitoso","id"=>$row['id']);
        }
        echo json_encode(array('response'=>$response));
    }
    	
    }

	mysqli_close($con);
	
}






?>