<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){

require_once('base.php');
   global $con;
    $query = "SELECT nombre FROM empresa";
     $result = mysqli_query($con, $query);
    $number_of_rows = mysqli_num_rows($result);
    $response  = array();

   
    if($number_of_rows > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $response[] = $row;
           
        }
    }

echo json_encode(array('response'=>$response));
}
?>