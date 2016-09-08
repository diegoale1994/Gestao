<?php

namespace Gestao\Http\Controllers;

use Illuminate\Http\Request;

use Gestao\Http\Requests;
use Gestao\Http\Controllers\Controller;
use Gestao\Clase;
use Session;
use Redirect;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $clases = Clase::all();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        clase::create([
        'id' => $request['id'],
        'nombre' => $request['nombre'],
        'grupo' => $request['grupo'],
        'creditos' => $request['creditos'],
        'semestre' => $request['semestre'],
        'cant_estudiantes' => $request['cant_estudiantes'],
        'requerimientos' => $request['requerimientos'],
]);

        return redirect('admin/clase')->with('message','Clase Creada Correctamente');
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
        Session::flash('message','Clase modificada!');
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
        Session::flash('message','Clase eliminada!');
        return Redirect::to('admin/clase');  
    }
}
