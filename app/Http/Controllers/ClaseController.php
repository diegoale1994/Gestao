<?php

namespace Gestao\Http\Controllers;

use Illuminate\Http\Request;

use Gestao\Http\Requests;
use Gestao\Http\Controllers\Controller;
use Gestao\Clase;
use Gestao\ClaseAulaHorario;
use Gestao\Constante;
use Session;
use Redirect;
use DB;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $clases = DB::table('clase')
            ->leftJoin('persona', 'persona.id', '=', 'clase.id_docente')->select('clase.id','nombre','grupo','creditos','semestre','cant_estudiantes','requerimientos',DB::raw('CONCAT(nombre1," " , apellido1) As docente'))->get();
    return view('clase.index',compact('clases'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clase.create');
    }

    public function createOcurrence($id){
        return view('clase.create_ocurrence',['clase'=>$id]);
    }

    public function desvincularDocente($id){
        $clase = clase::find($id);
        $clase['id_docente'] = null;
        $clase -> save();
        Session::flash('message',trans('messages.docenteDesvinculado'));
        return Redirect::to('admin/clase');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

try { 
  clase::create([
        'id' => $request['id'],
        'nombre' => ucwords($request['nombre']),
        'grupo' => $request['grupo'],
        'creditos' => $request['creditos'],
        'semestre' => $request['semestre'],
        'cant_estudiantes' => $request['cant_estudiantes'],
        'requerimientos' => $request['requerimientos'],
]);
       
       $this->calculateStoreOcurrence($request);

    return redirect('admin/clase')->with('message',trans('messages.claseCreadaCorrectamente'));   
} catch(\Illuminate\Database\QueryException $ex){ 
 return redirect('admin/clase')->with('message',trans('messages.codigoDeClaseRepetido'));   
}

      
        
    }

    public function storeOcurrence(Request $request){
        $this->calculateStoreOcurrence($request);
        return redirect('admin/clase')->with('message',trans('messages.ocurrenciaCreadaCorrectamente'));
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
        $clase = clase::find($id);
       
        return view('clase.edit',['clase'=>$clase]);
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
        $clase = clase::find($id);
        $clase -> fill($request -> all());
        $clase -> save();
        Session::flash('message',trans('messages.claseModificada'));
        return Redirect::to('admin/clase');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        clase::destroy($id);
        Session::flash('message',trans('messages.claseEliminada'));
        return Redirect::to('admin/clase');  
    }

    public function calculateStoreOcurrence($request){
         $finalSemestre = Constante::where('id','=','FINSEM')->first();
        $diaSemanaActual= ((getDate(time())['wday'])+6)%7;
        if($diaSemanaActual == $request['dia']){
            if($request['horaInicio']<= getDate(time())['hours']){
                $request['dia'] = $request['dia'] + 7;
            }

        }
        elseif($request['dia'] < $diaSemanaActual){
            $request['dia'] = $request['dia'] + 7;
        }
        $difDias= $request['dia'] - $diaSemanaActual ;
        $fechaEnHorario =strtotime("+".$difDias." day", time());

        $fechaInicial = date_create(date("Y-m-d H:i:s", $fechaEnHorario));
        $fechaFinal = date_create(date("Y-m-d H:i:s", $fechaEnHorario));

        date_time_set($fechaInicial, $request['horaInicio'], 0);
        date_time_set($fechaFinal, $request['horaFinal'], 0);

        $fechaInicial= $fechaInicial->getTimestamp();
        $fechaFinal= $fechaFinal->getTimestamp();
        $finalSemestre=strtotime($finalSemestre->valor);
        
        if($request['ocurrencias']==0){
            while($fechaInicial < $finalSemestre){
                DB::table('clase_aula_horario')->insert(
                    array('id_clase' => $request['id'],
                         'hora_inicio' =>  getDate($fechaInicial)['hours'] ,
                         'hora_final'=> getDate($fechaFinal)['hours'],
                         'fecha'=> date("Y-m-d", $fechaInicial) )
                );
                $fechaInicial = strtotime("+7 day",$fechaInicial);  
            }
        }else{
            DB::table('clase_aula_horario')->insert(
                array('id_clase' => $request['id'],
                    'hora_inicio' =>  getDate($fechaInicial)['hours'] ,
                    'hora_final'=> getDate($fechaFinal)['hours'],
                    'fecha'=> date("Y-m-d", $fechaInicial) )
            );

        }
    }
}
