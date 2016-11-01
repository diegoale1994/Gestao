
<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
   
   require_once('base.php');
   $image = $_POST['image'];
                $name = $_POST['name'];
 $actualpath = "../img_profiles/$name.jpg";
file_put_contents($actualpath,base64_decode($image));
}
?>