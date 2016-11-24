<?php


if($_SERVER["REQUEST_METHOD"]=='POST'){

require_once('base.php');

	$id_clase = $_POST['id_clase'];
	$fecha = $_POST['fecha'];
	$observacion=$_POST['observacion'];
	

	$query = "UPDATE clase_aula_horario SET observaciones=". (($observacion=='')?"NULL":("'".$observacion."'")) ." WHERE id_clase='$id_clase' AND fecha='$fecha' ";
	
	$final = mysqli_query($con, $query);
	if(!$final){
        echo 'No se pudo actualizar su observacion';
    }else{
    	 echo 'Observacion actualizada';
    }

    if(!$observacion==''){
    	 $query = "SELECT cell_token, nombre from persona, estudiante_clase, clase where estudiante_clase.id_clase = '$id_clase' and estudiante_clase.id_persona=persona.id and clase.id='$id_clase'";
     $result = mysqli_query($con, $query);
    $number_of_rows = mysqli_num_rows($result);
    
    $tokens = array();
    $clase_n="";
    if($number_of_rows >= 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $tokens[] = $row['cell_token'];
            $clase_n = $row['nombre'];
        }
    }

	$message = array("message" => "Cambio observacion: ".$clase_n."\n para la fecha ".$fecha);
	$message_status = send_notification($tokens, $message);
    }
	mysqli_close($con);
	
}



function send_notification ($tokens, $message)
	{
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array(
			 'registration_ids' => $tokens,
			 'data' => $message
			);
		$headers = array(
			'Authorization:key = AIzaSyBx4558ic1QeIaDgi3_ShbT_M7HtgkPMs8',
			'Content-Type: application/json'
			);
	   $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       return $result;
	}


?>