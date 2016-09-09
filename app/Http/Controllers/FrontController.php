<?php namespace Gestao\Http\Controllers;

use Gestao\Http\Requests;
use Gestao\Http\Controllers\Controller;
use App;
use Illuminate\Http\Request;

class FrontController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
			return view('login');
	}
	public function admin()
	{
			return view('admin.index');
	}
	public function langEspanol(){
		App::setLocale('es');
		return view('login');
	}
	public function langEnglish(){
		App::setLocale('en');
		return view('login');
	}

}
