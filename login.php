<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $con = mysqli_connect("localhost", "root", "", "Gestao");
 
$email = $_POST["correo"];
   $password = $_POST["password"];
      // $email = 'diego.fc.1@hotmail.com';
//   $password = '$2y$10$e/fIkZpaM907f7K6LI.2auNzfAQcyXP6F7GHYge8.tkzP2vujtHTa';
    $statement = mysqli_prepare($con, "SELECT id, nombre1, apellido1, email FROM persona WHERE email = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $email, $password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $id, $nombre1, $email, $password);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["email"] = $email;
        $response["id"] = $id;
        $response["name1"] = $nombre1;
        $response["password"] = $password;
    }
    
    echo json_encode($response);
}
?>