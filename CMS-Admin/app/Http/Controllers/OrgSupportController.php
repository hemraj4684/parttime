<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OrgSupport;

use Hash,Mail;
use Auth;
use DB;

use App\Http\Requests;

class OrgSupportController extends Controller
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
	
  		      $url = env('API_URL')."orgsupport";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
						$users = $results->users;
//						dd($users);
			return view('orgsupport.list')->with('users',$users);	
					
			

		}catch(Exception $e){
			echo $e->getMessage();
			
		}

		

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		//$request->session()->put('currentorg', '20');
		$value = $request->session()->get('currentorg');
		$orgtype = \DB::table('organizations')->lists('org_name','org_id');
		$roles = \DB::table('users')->where('role_id', '2')->lists('username','id');		 
        return view('orgsupport.create')->with('orgtype',$orgtype)->with('roles',$roles)->with('curorg',$value);
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
        'org_id'  => 'required',            
        'user_id' => 'required'        
    );
 $v = Validator::make($request->all(), $rules);

    if ($v->fails())
    {
		// get the error messages from the validator
		 // redirect our user back to the form with the errors from the validator
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
		// validation successful ---------------------------

			$users = new OrgSupport;	
			$users->org_id = $request->input('org_id');
            $users->user_id = $request->input('user_id');
			$users->created_by = $request->input('created_by');
            $users->updated_by = $request->input('updated_by');
            $users->save();
  				$request->session()->flash('alert-success', 'Successfully Added!');
			//return redirect('orgsupport');
			return redirect('org/review');
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
			return view('orgsupport.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

   	  		        $url = env('API_URL')."orgsupport/edit/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
		//$user = $results->users[0];
		$orgtype = \DB::table('organizations')->lists('org_name','org_id');
		$roles = \DB::table('users')->where('role_id', '2')->lists('username','id');	
		$user = OrgSupport::find($id);	 
       return view('orgsupport.edit')->with('users',$user)->with('orgtype',$orgtype)->with('roles',$roles);

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
        'org_id'  => 'required',            
        'user_id' => 'required'        
    );
 $v = Validator::make($request->all(), $rules);

    if ($v->fails())
    {
		// get the error messages from the validator
		 // redirect our user back to the form with the errors from the validator
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
		// validation successful ---------------------------

			$users = OrgSupport::find($id);	
			$users->org_id = $request->input('org_id');
            $users->user_id = $request->input('user_id');
			$users->created_by = $request->input('created_by');
            $users->updated_by = $request->input('updated_by');
            $users->save();
  			
			$request->session()->flash('alert-success', 'User Details successfully Updated!');
			return redirect('orgsupport');
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
       
	
$a5 = OrgSupport::where('org_sup_id', '=', $id)->update(['status' => 0]);
\Session::flash('alert-danger','Successfully deleted.');

        return redirect('orgsupport');
    }
	
}


?>
