<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizations;


use Auth,Validator;
use DB,Session;
use App\Http\Requests;
class SessionController extends Controller
{
	
    /**
     * 	Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
		
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		
    }


   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create($id1,$id2,$type)
    {
		print_r($request->input());
		echo $id1;echo $id2;exit;
		if($type ==1)
		{
			Session::push('latitude1', $id1 );
				Session::push('langitude1', $id2 );
		}
		if($type ==2)
		{
			Session::push('latitude2', $id1 );
			Session::push('langitude2', $id2 );
		}
				print_r(Session::all()); exit;
			
    }

   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id1,$id2,$type)
    {
		
		echo $id1;echo $id2;
		if($type ==1)
		{
			Session::push('latitude1', $id1 );
				Session::push('langitude1', $id2 );
		}
		if($type ==2)
		{
			Session::push('latitude2', $id1 );
			Session::push('langitude2', $id2 );
		}
				print_r(Session::all()); exit;
			
			

    }
	
	
	
}
