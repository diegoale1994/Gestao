<?php

namespace Gestao\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;
use Gestao\Persona;
use Gestao\Programa;
use Gestao\Http\Requests;
use Gestao\Http\Controllers\Controller;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $perfil = persona::find($id);
        $programas = programa::lists('nombre','id');

     return view('perfil.edit', compact('perfil', 'programas'));
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
        $perfil = persona::find($id);
        if($request['password'] != $request['password2']){
            Session::flash('error-message',trans('messages.lasContrasenasNoCoinciden'));
            return view('perfil.edit',['perfil'=>$perfil]);
        }
        if($request['password']==""){
            $request['password']=$perfil->password;
        }else{
        $request['password'] = bcrypt($request['password']);
        }
        $perfil -> fill($request -> all());
        $perfil -> save();
        Session::flash('message',trans('messages.perfilModificado'));
        return Redirect::to('admin');
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
