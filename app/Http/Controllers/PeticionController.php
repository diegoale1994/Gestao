<?php

namespace Gestao\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Redirect;
use Gestao\ClaseAulaHorario;
use Gestao\Http\Requests;
use Gestao\Http\Controllers\Controller;

class PeticionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peticiones = DB::table('clase_aula_horario')->join('clase','clase_aula_horario.id_clase','=','clase.id')->join('persona','clase_aula_horario.id_persona','=','persona.id')->select('clase_aula_horario.*','clase.nombre','persona.nombre1','persona.apellido1')->whereNotNull('id_persona')->whereNull('id_aula')->get();
        return view('peticion.index',compact('peticiones'));
    }

    public function irAHorario($fecha){
        $diaSemana= ((getDate(strtotime($fecha))['wday'])+6)%7;
        $fechaLunes = date ("Y-m-d", strtotime("-".$diaSemana." day", strtotime($fecha)));
        return redirect('admin/datasheet/0/'.$diaSemana.'/'.$fechaLunes);
    }

    public function eliminarPeticion($fecha,$id_clase){
        DB::table('clase_aula_horario')->where('fecha','=',$fecha)->where('id_clase','=',$id_clase)->delete();
        return redirect('admin/peticion')->with('message',trans('messages.ocurrenciaEliminadaCorrectamente'));
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
}
