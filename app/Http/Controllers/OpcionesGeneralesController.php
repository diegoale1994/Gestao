<?php

namespace Gestao\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Gestao\Constante;
use Redirect;
use Gestao\Http\Requests;
use Gestao\Http\Controllers\Controller;

class OpcionesGeneralesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inicioSemestre = Constante::where('id','=','INISEM')->first();
        $finSemestre=Constante::where('id','=','FINSEM')->first();;
        return view('opciones.index',compact('inicioSemestre','finSemestre'));
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
        $constante= Constante::find('INISEM');
        $constante -> valor= $request['inicio_semestre'];
        $constante->save();

        $constante= Constante::find('FINSEM');
        $constante -> valor= $request['fin_semestre'];
        $constante->save();    
        return Redirect::to('admin');
    }

    public function deleteDatasheet(){
        DB::table('clase_aula_horario')->delete();    
        return Redirect::to('admin');
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
