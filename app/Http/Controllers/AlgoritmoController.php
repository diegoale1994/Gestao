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
    $aulas = DB::table('aula')->select('id', 'nombre')->get();
    Session::put('aulas_array', $aulas);  
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
    public function destroy($id)
    {
        //
    }
    public function algorithm_step1(Request $request){
   
    $fecha_ini = $request['fecha_inicio'];
    $fecha_fin = $request['fecha_fin'];
    session::put('algoritmo_fecha_inicio', $fecha_ini);
    session::put('algoritmo_fecha_final', $fecha_fin);
    $clases_por_asignar = DB::table('clase_aula_horario')->join('clase', 'clase_aula_horario.id_clase', '=', 'clase.id')
            ->select('clase_aula_horario.*', 'clase.nombre', 'clase.cant_estudiantes')->whereBetween('fecha', [$fecha_ini, $fecha_fin])->wherenull('id_aula')->orderBy('clase.cant_estudiantes')->get();   
    return view('algoritmo.index', compact('clases_por_asignar'));
    
    
  



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
    echo $id."<br>";

    $event_data_display = Session::get('aulas_array');
    //unset($event_data_display[0]);
//unset($event_data_display[$index]);
    $i=0;
  foreach ($event_data_display as $key) {
    if($key -> id == $id){
        var_dump($key);
    unset($event_data_display[$i]);
    }
    $i++;
  }
  Session::put('aulas_array', $event_data_display);

return redirect('admin/algoritmo/algorithm_step1');
}
}
