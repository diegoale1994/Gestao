<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
   
$email = $_POST["correo"];
   $password = sha1($_POST["password"]);
   require_once('base.php');

    $statement = mysqli_prepare($con, "SELECT id, nombre1, apellido1, email,rol,password,estado FROM persona WHERE email = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $email, $password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $id, $nombre1,$apellido1, $email,$rol,$password,$estado);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["email"] = $email;
        $response["id"] = $id;
        $response["name1"] = $nombre1;
        $response["password"] = $password;
        $response["rol"]=$rol;
        $response["estado"]=$estado;
    }
    
    echo json_encode($response);
}
?>