<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
    //$id_persona = $_POST["id"];
     $token = $_POST["token"];
require_once('base.php');
   global $con;
    $q="INSERT INTO tokens (Token) VALUES ( '$token') "
              ." ON DUPLICATE KEY UPDATE Token = '$token';";
              
      mysqli_query($con,$q) or die(mysqli_error($con));
      mysqli_close($con);
echo "ok";
 }
    ?>