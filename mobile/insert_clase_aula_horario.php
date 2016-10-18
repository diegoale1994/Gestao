<?php


if($_SERVER["REQUEST_METHOD"]=='POST'){

require_once('base.php');

	$id_clase = $_POST['id_clase'];
	$id_persona = $_POST['id_persona'];
	$dia_semana = $_POST['dia_semana'];
	$hora_inicio=$_POST['hora_inicio'];
	$hora_final=$_POST['hora_final'];
    $ocurrencias=$_POST['ocurrencias'];


    


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

        


        if($ocurrencias==1){
            $statement = mysqli_prepare($con, "SELECT valor FROM constante WHERE id = 'FINSEM'");
            mysqli_stmt_execute($statement);
            mysqli_stmt_store_result($statement);
            mysqli_stmt_bind_result($statement, $valor);
            $response = array();
    
            while(mysqli_stmt_fetch($statement)){

                $finalSemestre = $valor;

            }


            if($finalSemestre==null){
                echo 'No existen fechas de final de semestre, por favor contactese con el monitor o realice peticiones individuales';
            }
            $finalSemestre=strtotime($finalSemestre);
            $cantidadReservadas=0;
            while($fechaInicial < $finalSemestre){

                $hora_inicio = getDate($fechaInicial)['hours'] ;
                $hora_final = getDate($fechaFinal)['hours'];
                $fecha= date("Y-m-d", $fechaInicial);

               $query = "INSERT INTO clase_aula_horario(id_clase,hora_inicio,hora_final,fecha,id_persona) VALUES ('$id_clase','$hora_inicio','$hora_final','$fecha','$id_persona')";
               $final = mysqli_query($con, $query);
                if($final){
                    $cantidadReservadas++;
                }
                $fechaInicial = strtotime("+7 day",$fechaInicial);  
            }
            echo 'Se realizo reservas en '.$cantidadReservadas.' dias diferentes, pendientes para asignacion';
        }else{
            $hora_inicio = getDate($fechaInicial)['hours'] ;
            $hora_final = getDate($fechaFinal)['hours'];
            $fecha= date("Y-m-d", $fechaInicial);

 
            $query = "INSERT INTO clase_aula_horario(id_clase,hora_inicio,hora_final,fecha,id_persona) VALUES ('$id_clase','$hora_inicio','$hora_final','$fecha','$id_persona')";
            $final = mysqli_query($con, $query);
            if(!$final){
                echo 'No se pudo realizar la peticion de reserva';
             }else{
                echo 'Reserva creada en pendiente a asignacion';
    }

        }	
	

	mysqli_close($con);
	
}






?>