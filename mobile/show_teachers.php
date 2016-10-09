
<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
   
   require_once('base.php');

    $statement = mysqli_prepare($con, "SELECT  id ,nombre1, apellido1 FROM persona where rol = 'D' and estado = 'A'");
   
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $id, $nombre1, $apellido1);
    
    $response = array();
    
    while(mysqli_stmt_fetch($statement)){
        $response[] = array("id"=>$id,"nombre"=>$nombre1,"apellido"=>$apellido1);
    }
    
    echo json_encode(array('response'=>$response));
}
?>