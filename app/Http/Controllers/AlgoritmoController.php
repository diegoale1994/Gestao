<?php

namespace Gestao\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Gestao\Algorithm\Algoritmo;
use Gestao\Http\Requests;
use Gestao\Http\Controllers\Controller;
use Gestao\ClaseAulaHorario;
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
        //
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
    echo $request['fecha_inicio']."<br>";
    echo $request['fecha_fin']."<br>";
    echo $request['constante'];
    $fecha_ini = $request['fecha_inicio'];
    $fecha_fin = $request['fecha_fin'];
    $example = DB::table('clase_aula_horario')->join('clase', 'clase_aula_horario.id_clase', '=', 'clase.id')
            ->select('clase_aula_horario.*', 'clase.nombre')->whereBetween('fecha', [$fecha_ini, $fecha_fin])->wherenull('id_aula')->orderBy('clase.nombre')->get();
          

/*
echo('<pre>');
var_dump($example);
echo('</pre>');



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
}
