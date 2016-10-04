<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
   
$email = $_POST["correo"];
   $password = sha1($_POST["password"]);
   require_once('base.php');
      // $email = 'diego.fc.1@hotmail.com';
//   $password = '$2y$10$e/fIkZpaM907f7K6LI.2auNzfAQcyXP6F7GHYge8.tkzP2vujtHTa';
    $statement = mysqli_prepare($con, "SELECT id, nombre1, apellido1, email,rol,password FROM persona WHERE email = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $email, $password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $id, $nombre1,$apellido1, $email,$rol,$password);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["email"] = $email;
        $response["id"] = $id;
        $response["name1"] = $nombre1;
        $response["password"] = $password;
        $response["rol"]=$rol;
    }
    
    echo json_encode($response);
}
?>