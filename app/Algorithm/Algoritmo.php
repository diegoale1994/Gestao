<?php

namespace Gestao\Algorithm;

use Illuminate\Support\Facades\DB;

class Algoritmo{

public function asignacion($aulas,$clases,$ajuste,$fecha,$horainicio,$horafinal){
	$resultados= array();
	$i=0;
	$j=0;
	foreach($aulas as $aula_actual){
		$resulados[$i]= array();
		foreach($clases as $clase_actual){
			$resultados[$i][$j]= ((abs(log($clase_actual/$aula_actual)))+
				($ajuste*($clase_actual-$aula_actual)));
			if($resultados[$i][$j]<0){
				$resultados[$i][$j]=0;
			}
			$j++;
		}
		$j=0;
		$i++;		
	}

$this->metodoHungaro($resultados,$aulas,$clases,$fecha,$horainicio,$horafinal);	

}

public function metodoHungaro($resultados,$aulas,$clases,$fecha,$horainicio,$horafinal){
	$resultadosTemporal=$resultados;
	$intentos=0;
	$numMin=INF;
	$intentos=0;
	for($i=0;$i<count($resultadosTemporal);$i++){
		$restando= false;
		$numMin= INF;
		for($j=0;$j<count($resultadosTemporal[$i]);$j++){
			if($resultadosTemporal[$i][$j] < $numMin && !$restando){
				$numMin=$resultadosTemporal[$i][$j];
			}
			if($restando){
				$resultadosTemporal[$i][$j]=$resultadosTemporal[$i][$j]-$numMin;
			}
			if((($j+1) == count($resultadosTemporal[$i])) && !$restando){
				$restando=true;
				$j=-1;
			}
		}
	}

	for($j=0;$j<count($resultadosTemporal[0]);$j++){
		$restando= false;
		$numMin= INF;
		for($i=0;$i<count($resultadosTemporal);$i++){
			if($resultadosTemporal[$i][$j] < $numMin && !$restando){
				$numMin=$resultadosTemporal[$i][$j];
			}
			if($restando){
				$resultadosTemporal[$i][$j]=$resultadosTemporal[$i][$j]-$numMin;
			}
			if((($i+1) == count($resultadosTemporal[$i])) && !$restando){
				$restando=true;
				$i=-1;
			}
		}
	}
	$this->evaluar($resultadosTemporal,0,$aulas,$clases,$fecha,$horainicio,$horafinal);

}
public function evaluar($resultadosTemporal,$intentos,$aulas,$clases,$fecha,$horainicio,$horafinal){
	$resultadosTotal = array();
	$temporalEvaluacion = $resultadosTemporal;
	$i=0;
	$j=0;
	while($i<count($temporalEvaluacion) || $j<count($temporalEvaluacion[0])){
		if($i<count($temporalEvaluacion)){
			$tachandoX=false;
			$cerosX=0;
			$tachadosXX=0;
			for($k=0;$k<count($temporalEvaluacion[0]);$k++){
				if($temporalEvaluacion[$i][$k]== INF){
					$tachadosXX++;
				}
				if($temporalEvaluacion[$i][$k]==0 &&  !$tachandoX){
					$cerosX++;
				}
				if($tachandoX){
					if($temporalEvaluacion[$i][$k]==0){
						$tachadosXY=0;
						for($x=0;$x<count($temporalEvaluacion);$x++){
							if($temporalEvaluacion[$x][$k]==INF){
								$tachadosXY++;
							}
						}
						if($tachadosXY != count($temporalEvaluacion)){
							for($x=0;$x<count($temporalEvaluacion);$x++){
								$temporalEvaluacion[$x][$k]=INF;
							}
							for($x=0;$x<count($temporalEvaluacion[$i]);$x++){
								$temporalEvaluacion[$i][$x]=INF;
							}
							$a=0;
							$b=0;

							foreach($aulas as $aulakey=>$aula_actual){
								foreach($clases as $clasekey=>$clase_actual){
									if($a==$i &&  $b==$k){
										$resultadosTotal[$aulakey]=$clasekey;
									}
									$b++;
								}
								$a++;
								$b=0;
							}
							$cerosX=0;
							$tachadosXX=0;
							$tachandoX=false;
							$i=0;
							$j=0;
							$k=-1;
						}else{
							$this->reasignacion($resultadosTemporal,$intentos,$aulas,$clases,$fecha,$horainicio,$horafinal);
						}
					}
					
				}
				if(($k+1 == count($temporalEvaluacion[$i]))&&($cerosX==1) && ($tachadosXX!= count($temporalEvaluacion[$i]))&&(!$tachandoX)){
						$tachandoX=true;
						$k=-1;
					}
			}
			$i++;
		}

		if($j<count($temporalEvaluacion[0])){
			$tachandoY=false;
			$cerosY=0;
			$tachadosYY=0;
			for($l=0;$l<count($temporalEvaluacion);$l++){
				if($temporalEvaluacion[$l][$j]== INF){
					$tachadosYY++;
				}
				if($temporalEvaluacion[$l][$j]==0 &&  !$tachandoY){
					$cerosY++;
				}
				if($tachandoY){
					if($temporalEvaluacion[$l][$j]==0){
						$tachadosYX=0;
						for($x=0;$x<count($temporalEvaluacion[$l]);$x++){
							if($temporalEvaluacion[$x][$j]==INF){
								$tachadosYX=0;
							}
						}
						if($tachadosYX != count($temporalEvaluacion[$l])){
							for($x=0;$x<count($temporalEvaluacion);$x++){
								$temporalEvaluacion[$x][$j]=INF;
							}
							for($x=0;$x<count($temporalEvaluacion[$i]);$x++){
								$temporalEvaluacion[$i][$x]=INF;
							}
							$a=0;
							$b=0;
							foreach($aulas as $aulakey=>$aula_actual){
								foreach($clases as $clasekey=>$clase_actual){
									if($a==$l &&  $b==$j){
										$resultadosTotal[$aulakey]=$clasekey;
									}
									$b++;
								}
								$a++;
								$b=0;
							}
							$cerosY=0;
							$tachadosYY=0;
							$tachandoY=false;
							$i=0;
							$j=0;
							$l=-1;
						}else{
							$this->reasignacion($resultadosTemporal,$intentos,$aulas,$clases,$fecha,$horainicio,$horafinal);
						}
					}
					
				}
				if(($l+1 == count($temporalEvaluacion))&&($cerosY==1) && ($tachadosYY!= count($temporalEvaluacion))&&(!$tachandoY)){
						$tachandoY=true;
						$l=-1;
					}
			}
			$j++;
		}

	}
	if(count($resultadosTotal) != count($resultadosTemporal[0])){
		$intentos++;
		if($intentos<10){
			$this->reasignacion($resultadosTemporal,$intentos,$aulas,$clases,$fecha,$horainicio,$horafinal);
		}else{
			print_r(count($resultadosTotal));
			$resultadosTotal= $this->minimoValor($temporalEvaluacion,$aulas,$clases,$resultadosTotal);
			$resultadosTotal= $this->minimoValor($temporalEvaluacion,$aulas,$clases,$resultadosTotal);
			$resultadosTotal= $this->minimoValor($temporalEvaluacion,$aulas,$clases,$resultadosTotal);
			$resultadosTotal= $this->minimoValor($temporalEvaluacion,$aulas,$clases,$resultadosTotal);
			$resultadosTotal= $this->minimoValor($temporalEvaluacion,$aulas,$clases,$resultadosTotal);
			foreach($resultadosTotal as $aulaF=>$claseF){
				DB::update("UPDATE clase_aula_horario 
                         SET id_aula='$aulaF'
                         where id_clase= '".$claseF."' and hora_inicio='".$horainicio."' and hora_final= '".$horafinal."' and fecha='".$fecha."'");
       	 	}
		}
	}else{
		foreach($resultadosTotal as $aulaF=>$claseF){
			 DB::update("UPDATE clase_aula_horario 
                         SET id_aula='$aulaF'
                         where id_clase= '".$claseF."' and hora_inicio='".$horainicio."' and hora_final= '".$horafinal."' and fecha='".$fecha."'");
       	 }
	} 

}
public function minimoValor($temporalEvaluacion,$aulas,$clases,$resultadosTotal){
	$numMin = INF;
	$tachando=false;
	if(count($temporalEvaluacion) < count($temporalEvaluacion[0])){
		for($i=0;$i<count($temporalEvaluacion);$i++){
			for($j=0;$j<count($temporalEvaluacion[$i]);$j++){
				if($temporalEvaluacion[$i][$j]<$numMin){
					$numMin=$temporalEvaluacion[$i][$j];
				}
				if($tachando){
					if($temporalEvaluacion[$i][$j]==$numMin){
						for($x=0;$x<count($temporalEvaluacion);$x++){
							$temporalEvaluacion[$x][$j]=INF;
						}
						for($x=0;$x<count($temporalEvaluacion[$i]);$x++){
							$temporalEvaluacion[$i][$x]=INF;
						}
						$a=0;
						$b=0;
						foreach($aulas as $aulakey=>$aula_actual){
							foreach($clases as $clasekey=>$clase_actual){
								if($a==$i &&  $b==$j){
									$resultadosTotal[$aulakey]=$clasekey;	
								}
								$b++;
							}
							$a++;
							$b=0;
						}
						$i=0;
						$j=-1;
						$numMin=INF;
						$tachando=false;
					}
				}
				if(($j+1 == count($temporalEvaluacion[$i])) && $numMin != INF){
					$j=-1;
					$tachando=true;
				}
			}
		}
	}else{
		for($j=0;$j<count($temporalEvaluacion[0]);$j++){
			for($i=0;$i<count($temporalEvaluacion);$i++){
				if($temporalEvaluacion[$i][$j]<$numMin){
					$numMin=$temporalEvaluacion[$i][$j];
				}
				if($tachando){
					if($temporalEvaluacion[$i][$j]==$numMin){
						for($x=0;$x<count($temporalEvaluacion);$x++){
							$temporalEvaluacion[$x][$j]=INF;
						}
						for($x=0;$x<count($temporalEvaluacion[$i]);$x++){
							$temporalEvaluacion[$i][$x]=INF;
						}
						$a=0;
						$b=0;
						foreach($aulas as $aulakey=>$aula_actual){
							foreach($clases as $clasekey=>$clase_actual){
								if($a==$i &&  $b==$j){
									$resultadosTotal[$aulakey]=$clasekey;
								}
								$b++;
							}
							$a++;
							$b=0;
						}
						$i=-1;
						$j=0;
						$numMin=INF;
						$tachando=false;
					}
				}
				if(($i+1 == count($temporalEvaluacion)) && ($numMin != INF)){
					$i=-1;
					$tachando=true;
				}
			}
		}
	}
	return $resultadosTotal;
}
public function reasignacion ($resultadosTemporal,$intentos,$aulas,$clases,$fecha,$horainicio,$horafinal){
	$matrizTachados=array();
	for($i=0;$i<count($resultadosTemporal);$i++){
		$matrizTachados[$i]=array();
		for($j=0;$j<count($resultadosTemporal[$i]);$j++){
			$matrizTachados[$i][$j]=0;
		}
	}
	for($cerosmin=(count($resultadosTemporal[0]) -1);$cerosmin>0;$cerosmin--){
		for($i=0;$i<count($resultadosTemporal);$i++){
			$ceros=0;
			for($j=0;$j<count($resultadosTemporal[$i]);$j++){
				if($resultadosTemporal[$i][$j]==0 && $matrizTachados[$i][$j]==0){
					$ceros++;
				}
				if(($j+1==count($resultadosTemporal[$i]))&& ($ceros>=$cerosmin)){
					for($x=0;$x<count($matrizTachados[$i]);$x++){
						$matrizTachados[$i][$x]++;
					}
				}
			}
		}
		for($j=0;$j<count($resultadosTemporal[0]);$j++){
			$ceros=0;
			for($i=0;$i<count($resultadosTemporal);$i++){
				if($resultadosTemporal[$i][$j]==0 && $matrizTachados[$i][$j]==0){
					$ceros++;
				}
				if(($i+1==count($resultadosTemporal))&& ($ceros>=$cerosmin)){
					for($x=0;$x<count($matrizTachados[$i]);$x++){
						$matrizTachados[$x][$j]++;
					}
				}
			}
		}
	}
	$numMin=INF;
	for($i=0;$i<count($resultadosTemporal);$i++){
		for($j=0;$j<count($resultadosTemporal[$i]);$j++){
			if(($matrizTachados[$i][$j]==0) && ($resultadosTemporal[$i][$j] < $numMin) && ($resultadosTemporal[$i][$j]!=0) ){
				$numMin=$resultadosTemporal[$i][$j];
			}
		}
	}
	for($i=0;$i<count($resultadosTemporal);$i++){
		for($j=0;$j<count($resultadosTemporal[$i]);$j++){
			if(($matrizTachados[$i][$j]==0) && ($resultadosTemporal[$i][$j]!=0)){
				$resultadosTemporal[$i][$j]=$resultadosTemporal[$i][$j] - $numMin;
			}
			if($matrizTachados[$i][$j]==2){
				$resultadosTemporal[$i][$j]=$resultadosTemporal[$i][$j] + $numMin;
			}
		}
	}
	$this->evaluar($resultadosTemporal,$intentos,$aulas,$clases,$fecha,$horainicio,$horafinal);
}
}
