<?php namespace Gestao\Http\Controllers;

use Gestao\Http\Requests;
use Gestao\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FrontController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
			return view('index');
	}
	public function admin()
	{
			return view('admin.index');
	}

}
