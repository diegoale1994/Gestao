<?php


if($_SERVER["REQUEST_METHOD"]=='POST'){

require_once('base.php');

	$id_clase = $_POST['id_clase'];
	$id_persona = $_POST['id_persona'];
	$dia_semana = $_POST['dia_semana'];
	$hora_inicio=$_POST['hora_inicio'];
	$hora_final=$_POST['hora_final'];


    $diaSemanaActual= ((getDate(time())['wday'])+6)%7;
        if($diaSemanaActual == $dia_semana){
            if($hora_inicio <= getDate(time())['hours']){
                $dia_semana = $dia_semana + 7;
            }

        }
        elseif($dia_semana < $diaSemanaActual){
            $dia_semana = $dia_semana + 7;
        }
        $difDias= $dia_semana - $diaSemanaActual ;
        $fechaEnHorario =strtotime("+".$difDias." day", time());

        $fechaInicial = date_create(date("Y-m-d H:i:s", $fechaEnHorario));
        $fechaFinal = date_create(date("Y-m-d H:i:s", $fechaEnHorario));

        date_time_set($fechaInicial, $hora_inicio, 0);
        date_time_set($fechaFinal, $hora_final, 0);

        $fechaInicial= $fechaInicial->getTimestamp();
        $fechaFinal= $fechaFinal->getTimestamp();
        
        $hora_inicio = getDate($fechaInicial)['hours'] ;
        $hora_final = getDate($fechaFinal)['hours'];
        $fecha= date("Y-m-d", $fechaInicial);

 
	$query = "INSERT INTO clase_aula_horario(id_clase,hora_inicio,hora_final,fecha,id_persona) VALUES ('$id_clase','$hora_inicio','$hora_final','$fecha','$id_persona')";
	
	$final = mysqli_query($con, $query);
	if(!$final){
        echo $id_clase." ".$hora_inicio." ".$hora_final." ".$fecha." ".$id_persona;
    }else{
    	 echo 'Reserva creada en pendiente a asignacion';
    }

	mysqli_close($con);
	
}






?>