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
         


$tokens = array();
             $profesor_token = DB::table('persona')->select('cell_token')->where('id', $id)->get();
     foreach ($profesor_token as $key) {
        $tokens[] = $key -> cell_token;
     }
    $message = array("message" => "DOCENTE APROBADO!");
    $message_status = send_notification($tokens, $message);
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
 function send_notification ($tokens, $message)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = array(
             'registration_ids' => $tokens,
             'data' => $message
            );
        $headers = array(
            'Authorization:key = AIzaSyBx4558ic1QeIaDgi3_ShbT_M7HtgkPMs8',
            'Content-Type: application/json'
            );
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       return $result;
    }