<?php namespace Gestao\Http\Controllers;

use Gestao\Http\Requests;
use Gestao\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Gestao\Aula;
use Session;
use Redirect;
class AulaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$aulas = aula::all();
	return view('aula.index',compact('aulas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('aula.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		aula::create([
		'id' => $request['id'],
		'nombre' => $request['nombre'],
		'cant_equipos' => $request['cant_equipos'],
		'cant_personas' => $request['cant_personas'],
		'piso' => $request['piso'],
]);

	return redirect('admin/aula')->with('message','Aula Creada Correctamente');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$aula = aula::find($id);
		return view('aula.edit',['aula'=>$aula]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$aula = aula::find($id);
		$aula -> fill($request -> all());
		$aula -> save();
		Session::flash('message','Aula modificada!');
		return Redirect::to('admin/aula');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		aula::destroy($id);
		Session::flash('message','Aula eliminada!');
		return Redirect::to('admin/aula');	
	}

}
