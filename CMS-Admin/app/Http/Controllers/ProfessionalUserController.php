<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OrgprofUsers;

use Hash,Mail;
use Auth;
use DB;
use Validator;
use App\Http\Requests;

class ProfessionalUserController extends Controller
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
    public function index()
    {

		try{
	
  		      $url = env('API_URL')."orgprofusers";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
						$users = $results->users;
//						dd($users);
			return view('orgprofusers.list')->with('users',$users);	
					
			

		}catch(Exception $e){
			echo $e->getMessage();
			
		}

		

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$orgtype = \DB::table('organizations')->lists('org_name','org_id');
		$roles = \DB::table('users')->where('role_id', '48')->lists('username','id');		 
        return view('orgprofusers.create')->with('orgtype',$orgtype)->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	$rules = array(
        'org_id'             => 'required',            
        'user_id'         => 'required'        
    );
 $v = Validator::make($request->all(), $rules);

    if ($v->fails())
    {
		// get the error messages from the validator
		 // redirect our user back to the form with the errors from the validator
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
		// validation successful ---------------------------

			$users = new OrgprofUsers;	
			$users->org_id = $request->input('org_id');
            $users->user_id = $request->input('user_id');
			$users->created_by = $request->input('created_by');
            $users->updated_by = $request->input('updated_by');
            $users->save();
  				$request->session()->flash('alert-success', 'User successfully Added!');
			return redirect('orgprofusers');
	}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	          $url = env('API_URL')."users/show/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
			
			$user = $results->users[0];
			return view('orgprofusers.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

   	  		        $url = env('API_URL')."orgprofusers/edit/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
		//$user = $results->users[0];
		$orgtype = \DB::table('organizations')->lists('org_name','org_id');
		$roles = \DB::table('users')->where('role_id', '48')->lists('username','id');	
		$user = OrgprofUsers::find($id);	 
       return view('orgprofusers.edit')->with('users',$user)->with('orgtype',$orgtype)->with('roles',$roles);

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
$rules = array(
        'org_id'             => 'required',            
        'user_id'         => 'required'        
    );
 $v = Validator::make($request->all(), $rules);

    if ($v->fails())
    {
		// get the error messages from the validator
		 // redirect our user back to the form with the errors from the validator
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
		// validation successful ---------------------------
			$users = OrgprofUsers::find($id);	
			$users->org_id = $request->input('org_id');
            $users->user_id = $request->input('user_id');
			$users->created_by = $request->input('created_by');
            $users->updated_by = $request->input('updated_by');
            $users->save();
  			
			$request->session()->flash('alert-success', 'User Details successfully Updated!');
			return redirect('orgprofusers');
   
	}
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $users = OrgprofUsers::find($id);

        $users->delete();
\Session::flash('alert-danger','Successfully deleted.');

        return redirect('orgprofusers');
    }
	
}


?>