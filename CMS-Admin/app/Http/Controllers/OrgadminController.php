<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Hash,Mail;
use Auth,DB,Validator;

use App\Http\Requests;

class OrgadminController extends Controller
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
			
  		     $url = env('API_URL')."orgadmins";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
//			 echo '<pre>';print_r($results);exit;
						$users = $results->data;
	$orgtype = \DB::table('organizations')->lists('org_name','org_id');
	$roles = \DB::table('roles')->lists('role_name','role_id');	
	
			return view('orgadmin.list')->with('users',$users)->with('orgtype', $orgtype)->with('roles',$roles);		

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
		$roles = \DB::table('roles')->lists('role_name','role_id');		 
        return view('orgadmin.create')->with('orgtype',$orgtype)->with('roles',$roles)->with('curorg',$value);
    }
	
	public function adduser(Request $request)
    {
		
		
		$orgtype = \DB::table('organizations')->lists('org_name','org_id');
		$roles = \DB::table('roles')->lists('role_name','role_id');		 
        return view('orgadmin.adduser')->with('orgtype',$orgtype)->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$v = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'org_id' => 'required',
			'username'=>'required',
			'role_id'=>'required',
			'firstname'=>'required',
			'lastname'=>'required',
			'phone_number'=>'required',
			'address_line1'=>'required',
			'city'=>'required',
			'state'=>'required',
			'country'=>'required',
			'zipcode'=>'required',
			'gender'=>'required',
			
    ]);

    if ($v->fails())
    {
	// get the error messages from the validator
		 // redirect our user back to the form with the errors from the validator
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
		// validation successful ---------------------------
		
					$parent_id = Auth::user()->parent_id;	
					$client_id = Auth::user()->client_id;			
			$pass_string = str_random(8);
          $org_id =$request->input('org_id');
		  $confirmation_code = str_random(30);

			$results = DB::select('select * from organizations where org_id ='.$org_id);
			//dd($results);

            $email = $request->input('email');
            $users = new User;		
			$users->parent_id = $parent_id;
			$users->org_id = $request->input('org_id');
            $users->org_unique_id = $results[0]->org_unique_id;
			$users->role_id = $request->input('role_id');
			$users->username = $request->input('username');
			$users->firstname = $request->input('firstname');
			$users->lastname = $request->input('lastname');
			$users->middlename = $request->input('middlename');
			$users->email = $request->input('email');
			$users->password = Hash::make($pass_string);
			$users->sign_in_count = '0';
			$users->phone_number = $request->input('phone_number');
			$users->address_line1 = $request->input('address_line1');
			$users->address_line2 = $request->input('address_line2');
			$users->gender = $request->input('gender');
			$users->city = $request->input('city');
			$users->state = $request->input('state');
			$users->country = $request->input('country');
			$users->zipcode = $request->input('zipcode');
			$users->created_by = $request->input('created_by');
            $users->updated_by = $request->input('updated_by');
			$users->org_department_id = '0';
			$users->status = '1';			
            $users->save();
			
			$uname = $request->input('username');
			$pwd = $pass_string;
			$uniquecode = $results[0]->org_unique_id;
			$orgname =  $results[0]->org_name;
    $email = $request->input('email');
    $code = $confirmation_code;

    $data = array('username'=>$uname,'email'=>$email,'pwd'=>$pwd,'orgname'=>$orgname,'uniquecode'=>$uniquecode, 'code'=>$code);
    Mail::send('emails.conform', $data, function ($message) use ($data) {
      $message->subject('Verify your email address - org admin')
              ->to($data['email']);
    });
			
			
			$request->session()->flash('alert-success', 'User successfully Added!');
			//return redirect('orgadmin');
			
			 $subplans = \DB::table('services')->lists('service_name', 'service_id');
		 $orgs = \DB::table('organizations')->lists('org_name', 'org_id');
    return redirect('orgservice/create')->with('services', $subplans)->with('orgs', $orgs);
	}
    }
	
	 public function saveuser(Request $request)
    {
		
		//print_r($request->input());exit;
		$v = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'org_id' => 'required',
			'username'=>'required',
			'role_id'=>'required',
			'firstname'=>'required',
			'lastname'=>'required',
			'phone_number'=>'required',
			'address_line1'=>'required',
			'city'=>'required',
			'state'=>'required',
			'country'=>'required',
			'zipcode'=>'required',
			'gender'=>'required',
			
    ]);

    if ($v->fails())
    {
	// get the error messages from the validator
		 // redirect our user back to the form with the errors from the validator
         return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
		// validation successful ---------------------------
		
					$parent_id = Auth::user()->parent_id;	
					$client_id = Auth::user()->client_id;			
		$pass_string = str_random(8);
          $org_id =$request->input('org_id');
		  $confirmation_code = str_random(30);

			$results = DB::select('select * from organizations where org_id ='.$org_id);
			//dd($results);

            $email = $request->input('email');
            $users = new User;		
			$users->parent_id = $parent_id;
			$users->org_id = $request->input('org_id');
            $users->org_unique_id = $results[0]->org_unique_id;
			$users->role_id = $request->input('role_id');
			$users->username = $request->input('username');
			$users->firstname = $request->input('firstname');
			$users->lastname = $request->input('lastname');
			$users->middlename = $request->input('middlename');
			$users->email = $request->input('email');
			$users->password = Hash::make($pass_string);
			$users->sign_in_count = '0';
			$users->phone_number = $request->input('phone_number');
			$users->address_line1 = $request->input('address_line1');
			$users->address_line2 = $request->input('address_line2');
			$users->gender = $request->input('gender');
			$users->city = $request->input('city');
			$users->state = $request->input('state');
			$users->country = $request->input('country');
			$users->zipcode = $request->input('zipcode');
			$users->created_by = $request->input('created_by');
            $users->updated_by = $request->input('updated_by');
			$users->org_department_id = '0';
			$users->status = '1';			
            $users->save();
			
			$uname = $request->input('username');
			$pwd = $pass_string;
			$uniquecode = $results[0]->org_unique_id;
			$orgname =  $results[0]->org_name;
    $email = $request->input('email');
    $code = $confirmation_code;

    $data = array('username'=>$uname,'email'=>$email,'pwd'=>$pwd,'orgname'=>$orgname,'uniquecode'=>$uniquecode, 'code'=>$code);
    Mail::send('emails.conform', $data, function ($message) use ($data) {
      $message->subject('Verify your email address')
              ->to($data['email']);
    });
			
			
			$request->session()->flash('alert-success', 'User successfully Added!');
			return redirect('orgadmin');
			
			
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
	          $url = env('API_URL')."orgadmins/show/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
//			 dd($results);
			$user = $results->data[0];
			return view('orgadmin.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
   	  		         $url = env('API_URL')."orgadmins/edit/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
		$user = $results->data[0];
		$orgtype = \DB::table('organizations')->lists('org_name','org_id');
		$roles = \DB::table('roles')->lists('role_name','role_id');		 
        return view('orgadmin.edit')->with('users',$user)->with('orgtype',$orgtype)->with('roles',$roles);

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

	$v = Validator::make($request->all(), [
            'email' => 'required|email',
            'org_id' => 'required',
			'username'=>'required',
			'role_id'=>'required',
			'firstname'=>'required',
			'lastname'=>'required',	
			'phone_number'=>'required',
			'address_line1'=>'required',
			'city'=>'required',
			'state'=>'required',
			'country'=>'required',
			'zipcode'=>'required',
			'gender'=>'required',
			
    ]);

    if ($v->fails())
    {
	// get the error messages from the validator
		 // redirect our user back to the form with the errors from the validator
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
		// validation successful ---------------------------

          $org_id =$request->input('org_id');
		  $confirmation_code = str_random(30);
			$results = DB::select('select * from organizations where org_id ='.$org_id);
			//dd($results);

			$parent_id = Auth::user()->parent_id;	
					$client_id = Auth::user()->client_id;			
        
		    $users = User::find($id);
			$users->parent_id = $parent_id;
			$users->org_id = $request->input('org_id');
            $users->role_id = $request->input('role_id');
			$users->org_unique_id = $results[0]->org_unique_id;
			$users->username = $request->input('username');
			$users->firstname = $request->input('firstname');
			$users->lastname = $request->input('lastname');
			$users->middlename = $request->input('middlename');
			$users->email = $request->input('email');
			$users->phone_number = $request->input('phone_number');
			$users->address_line1 = $request->input('address_line1');
			$users->address_line2 = $request->input('address_line2');
			$users->gender = $request->input('gender');
			$users->city = $request->input('city');
			$users->state = $request->input('state');
			$users->country = $request->input('country');
			$users->zipcode = $request->input('zipcode');
            $users->updated_by = $request->input('updated_by');
			$users->org_department_id = '0';
			$users->status = $request->input('status');			
            $users->save();
			$request->session()->flash('alert-success', 'User Details successfully Updated!');
			return redirect('orgadmin');
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
      

		  $a1 = User::where('id', '=', $id)->update(['status' => 0]);

		//$request->session()->flash('alert-dager', 'User successfully Deleted!');
\Session::flash('alert-danger','Successfully deleted.');

        return redirect('orgadmin');
    }
	
		public function searchres(Request $request)
{

     $query = $request->input('search');

    $users = DB::table('users as u')
	->where('u.firstname', 'LIKE', '%' . $query . '%')
	
	->orWhere('u.lastname', 'LIKE', '%' . $query . '%')
	->orWhere('u.email', 'LIKE', '%' . $query . '%')
	->orWhere('u.org_unique_id', 'LIKE', '%' . $query . '%')
	->orWhere('org.org_name', 'LIKE', '%' . $query . '%')
	->join('organizations as org', 'u.org_id', '=', 'org.org_id')
	->join('users as u1', 'u.created_by', '=', 'u1.id')
	->join('users as u2', 'u.updated_by', '=', 'u2.id')
	->select('u.*', 'org.org_name','u1.username as createduser','u2.username as updateduser') 
	->where('u.role_id','=','5')
	->get();
//dd($users);

$orgtype = \DB::table('organizations')->lists('org_name','org_id');
	$roles = \DB::table('roles')->lists('role_name','role_id');	
	
			return view('orgadmin.list')->with('users',$users)->with('orgtype', $orgtype)->with('roles',$roles);
 }
	public function advancesearch(Request $request)
{
	  $query1 = $request->input('orgunique');
	  $query2 = $request->input('org');
	   
	
$users = DB::table('users as u')
	->where('u.org_unique_id', 'LIKE', '%' . $query1 . '%')
	->orWhere('org.org_name', 'LIKE', '%' . $query2 . '%')
	->join('organizations as org', 'u.org_id', '=', 'org.org_id')
	->join('users as u1', 'u.created_by', '=', 'u1.id')
	->join('users as u2', 'u.updated_by', '=', 'u2.id')
	->select('u.*', 'org.org_name','u1.username as createduser','u2.username as updateduser') 
	->where('u.role_id','=','5')
	->get();
//dd($users);

						
		$orgtype = \DB::table('organizations')->lists('org_name','org_id');
	$roles = \DB::table('roles')->lists('role_name','role_id');	
	
			return view('orgadmin.list')->with('users',$users)->with('orgtype', $orgtype)->with('roles',$roles);


 }
	
	
}
