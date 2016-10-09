<?php

namespace Gestao\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Gestao\Http\Requests;
use Gestao\Http\Controllers\Controller;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $profesores = DB::table('persona')->where('rol', '=', 'D')->orderBy('id', 'asc')->get();
     
    return view('profesor.index',compact('profesores'));
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
    public function aprobar($id=null)
    {
      DB::table('persona')
            ->where('id', $id)
            ->update(['estado' => 'A']);
            return redirect('admin/profesores')->with('message',trans('messages.profesorAprobadoCorrectamente'));
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
       DB::table('persona')->where('id', '=', $id)->delete();
        DB::table('docente')->where('persona_id', '=', $id)->delete();
         return redirect('admin/profesores')->with('message',trans('messages.profesorEliminadoCorrectamente'));
    }
}
