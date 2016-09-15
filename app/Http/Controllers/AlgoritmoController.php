<?php

namespace Gestao\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Gestao\Algorithm\Algoritmo;
use Gestao\Http\Requests;
use Gestao\Http\Controllers\Controller;
use Gestao\ClaseAulaHorario;
use Session;
class AlgoritmoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
    return view('algoritmo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function algorithm_operation(){
        $clases_final = Session::get('clases_por_asignar');
        $aulas_final = Session::get('aulas_array');
        $resultado = count(Session::get('aulas_array'));
echo Session::get('constante')." constante";
        echo "<br>";
echo $resultado." Cantidad de aulas";
echo "<br>";
        echo Session::get('clases_por_asignar_count')." Cantidad de clases";
        echo "<br>";
     
             echo '<pre>';
        var_dump($clases_final);
        echo  '</pre>';

//return view('algoritmo.step2',compact('example'));

/*
    $algoritmo = new Algoritmo();
$aulas= array(
    "AUL006"=> 29,
    "AUL003" => 20,
    "AUL001" => 19,
    "AUL010" => 18,
    "AUL002" => 18,
    "AUL007" => 18,
    "AUL008" => 17,
    "AUL009" => 17,
    "AUL005" => 17,
    "AUL004" => 13
    );
$clases= array(
    "CLA1" => 30,
    "CLA2" => 28,
    "CLA3" => 20,
    "CLA4" => 18,
    "CLA5" => 12,
    "CLA6" => 20
    );
$ajuste= 0.03;
$fecha="2016-09-19";
$horainicio=7;
*/
$clasesAAsignar= array();

$fechaIni= session::get('algoritmo_fecha_inicio');
$fechaFin= session::get('algoritmo_fecha_final');
$fechaIni = strtotime($fechaIni);
$fechaFin = strtotime($fechaFin);
$conta=1;
for($fechaIni;$fechaIni<=$fechaFin;$fechaIni+=86400){echo "Dia: ".$conta."<br>";
    
    for ($hora=7; $hora<22 ; $hora++) {echo "<br>hora de: ".$hora."<br>"; 
        $arregloFechas= array();
    $arregloAulasARemover=array();
    $arregloAulas=array();
        foreach ($clases_final as $claseActual) {
            if(strtotime($claseActual->fecha) == $fechaIni){
                if($claseActual->hora_inicio == $hora){  
                    $arregloFechas[$claseActual->id_clase] = $claseActual->cant_estudiantes;
                      echo "<br>soy asignado ".$claseActual->nombre." -> ".$claseActual->id_clase;
                }}}



                $arregloAulasARemover =DB::select("select id_aula from clase_aula_horario where hora_inicio <'".$hora."' and fecha = '".date("Y-m-d",$fechaIni)."';");
                
               
                foreach (session::get('aulas_array') as $aula) {
                $arregloAulas[$aula->id]=$aula->cant_equipos;
                
                 }

                foreach($arregloAulas as $codigo=>$cant_estudiantes)
    {
                foreach ($arregloAulasARemover as $aula1) {
                    if($codigo==$aula1->id_aula){
                        unset($arregloAulas[$codigo]);
                    }
                }
           

    
    }

echo "<br>este es el arreglo de clases<br>";
           
                echo '<pre>';
        var_dump($arregloFechas);
        echo  '</pre>';
        echo "<br>este es el arreglo de aulas final<br>";
                 echo '<pre>';
        var_dump($arregloAulas);
        echo  '</pre>';
        echo "<br>este es el arreglo de aulas que manda el usuario que debe usar<br>";
         echo '<pre>';
        var_dump(session::get('aulas_array'));
        echo  '</pre>';
echo "<br>este es el arreglo de aulas que estan ocupadas<br>";
        echo '<pre>';
        var_dump($arregloAulasARemover);
        echo  '</pre>';
    $algoritmo = new Algoritmo();
$algoritmo->asignacion($arregloAulas,$arregloFechas,0.03,date("Y-m-d",$fechaIni),$hora);
    }
    $conta++;
}
           


        
   // $algoritmo->asignacion($aulas,$clases,$ajuste,$fecha,$horainicio);
   
}
    public function destroy($id)
    {
        //
    }
    public function algorithm_step1(Request $request){
   $constante = $request['constante'];

    $fecha_ini = $request['fecha_inicio'];
    $fecha_fin = $request['fecha_fin'];
    session::put('algoritmo_fecha_inicio', $fecha_ini);
    session::put('algoritmo_fecha_final', $fecha_fin);
    session::put('constante', $constante);
    $clases_por_asignar = DB::table('clase_aula_horario')->join('clase', 'clase_aula_horario.id_clase', '=', 'clase.id')
            ->select('clase_aula_horario.*', 'clase.nombre', 'clase.cant_estudiantes')->whereBetween('fecha', [$fecha_ini, $fecha_fin])->wherenull('id_aula')->get(); 
    $clases_por_asignar_count = DB::table('clase_aula_horario')->join('clase', 'clase_aula_horario.id_clase', '=', 'clase.id')
            ->select('clase_aula_horario.*', 'clase.nombre', 'clase.cant_estudiantes')->whereBetween('fecha', [$fecha_ini, $fecha_fin])->wherenull('id_aula')->orderBy('clase.cant_estudiantes')->count();
             $aulas = DB::table('aula')->select('id', 'nombre', 'cant_equipos')->get();
    Session::put('aulas_array', $aulas); 
     Session::put('clases_por_asignar_count', $clases_por_asignar_count);    
    Session::put('clases_por_asignar', $clases_por_asignar);    
    return view('algoritmo.step2', compact('clases_por_asignar'));
    
    
  



//return view('algoritmo.step2',compact('example'));

/*
    $algoritmo = new Algoritmo();
$aulas= array(
    "AUL006"=> 29,
    "AUL003" => 20,
    "AUL001" => 19,
    "AUL010" => 18,
    "AUL002" => 18,
    "AUL007" => 18,
    "AUL008" => 17,
    "AUL009" => 17,
    "AUL005" => 17,
    "AUL004" => 13
    );
$clases= array(
    "CLA1" => 30,
    "CLA2" => 28,
    "CLA3" => 20,
    "CLA4" => 18,
    "CLA5" => 12,
    "CLA6" => 20
    );
$ajuste= 0.03;
$fecha="2016-09-19";
$horainicio=7;
$horafinal=9;
        $algoritmo->asignacion($aulas,$clases,$ajuste,$fecha,$horainicio,$horafinal);
        return "listo";
    */
}
public function delete_aula($id){
   

    $event_data_display = Session::get('aulas_array');
    //unset($event_data_display[0]);
//unset($event_data_display[$index]);
    $i=0;
  foreach ($event_data_display as $key) {
    if($key -> id == $id){
       
    unset($event_data_display[$i]);
    array_splice($event_data_display,$i,0);
    }
    $i++;
  }
  var_dump($event_data_display);
  Session::put('aulas_array', $event_data_display);

return redirect('admin/algoritmo');
}
}
