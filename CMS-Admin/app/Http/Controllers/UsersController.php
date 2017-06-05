<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Hash,Mail;
use Auth,DB,Validator;
use App\Models\OrgSupport;
use App\Http\Requests;

class UsersController extends Controller
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
			if(Auth::user()->role_id == '3')
			{
				 $id = Auth::user()->id;			
			}else{
				  $id = Auth::user()->parent_id;			
			}
			
  		          $url = env('API_URL')."users/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
						$users = $results->users;
$profuser = DB::table('org_support_details')
->join('organizations as org', 'org_support_details.org_id', '=', 'org.org_id')
->select('org_support_details.*','org.org_name')
 ->get();
$orgtype = \DB::table('organizations')->lists('org_name','org_id');
	$roles = \DB::table('roles')->lists('role_name','role_id');						
			return view('users.list')->with('users',$users)->with('orgtype', $orgtype)->with('roles',$roles);	
					
			

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
		$roles = \DB::table('roles')->lists('role_name','role_id');		 
        return view('users.create')->with('orgtype',$orgtype)->with('roles',$roles);
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

          $org_id =$request->input('org_id');
		  $confirmation_code = str_random(30);
		  $pass_string = str_random(8);

			$results = DB::select('select * from organizations where org_id ='.$org_id);
			//dd($results);

					$parent_id = Auth::user()->parent_id;	
					$client_id = Auth::user()->client_id;			
            $email = $request->input('email');
			$users = new User;		
			$users->parent_id = $parent_id;
			$users->org_id = $request->input('org_id');
            $users->role_id = $request->input('role_id');
			$users->org_unique_id = $results[0]->org_unique_id;
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
			$users->confirmation_code = $confirmation_code;
			$users->created_by = $request->input('created_by');
            $users->updated_by = $request->input('updated_by');
			$users->org_department_id = '0';
			$users->status = '1';			
            $users->save();
  	
			$results = DB::select('select * from organizations where org_id ='.$org_id);
			//dd($results);
			$uname = $request->input('username');
			$pwd = $pass_string;
			$uniquecode = $results[0]->org_unique_id;
			$orgname =  $results[0]->org_name;
    $email = $request->input('email');
    $code = $confirmation_code;

    $data = array('username'=>$uname,'email'=>$email,'pwd'=>$pwd,'orgname'=>$orgname,'uniquecode'=>$uniquecode, 'code'=>$code);
    Mail::send('emails.verify', $data, function ($message) use ($data) {
      $message->subject('Verify your email address')
              ->to($data['email'])->cc('vattili@aadhya-analytics.com');
    });
			
			$request->session()->flash('alert-success', 'User successfully Added!');
			return redirect('users');

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
			return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//         $users = User::find($id);
   	  		        $url = env('API_URL')."users/edit/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
		$user = $results->users[0];
		$orgtype = \DB::table('organizations')->lists('org_name','org_id');
		$orgtype1 = \DB::table('organizations')->where('status','1')->get();
		$roles = \DB::table('roles')->lists('role_name','role_id');	
		 $orgsup_org = DB::table('org_support_details')
             ->select('org_id')
			->where('user_id','=',$id)
			->get();	
			 $orgsup_role = DB::table('org_support_details')
             ->select('role_id')
			->where('user_id','=',$id)
			->get();	
			//dd($orgsup_org);
			//dd($orgsup_role);	 
        return view('users.edit')->with('users',$user)->with('orgtype1',$orgtype1)->with('orgtype',$orgtype)->with('roles',$roles)->with('org_sup',$orgsup_org)->with('role_sup',$orgsup_role);

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
		//echo '<pre>';
		
//print_r($request->input());exit;
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
			$users->status = '1';			
            $users->save();
			
			$users_org_id_array = $request->input('org_id_array');//print_r($users_org_id_array);
			$users_role_id_array = $request->input('role_id_array');//print_r($users_role_id_array);
			$count = count($users_org_id_array);
			for($i=0;$i<$count;$i++)
			{
				$us = new OrgSupport;	
				$us->org_id = $users_org_id_array[$i];
				$us->role_id = $users_role_id_array[$i];
				$us->user_id = $id;
				$us->created_by = $request->input('created_by');
				$us->updated_by = $request->input('updated_by');
				$us->save();
			}
					
			$request->session()->flash('alert-success', 'User Details successfully Updated!');
			//\Session::flash('alert-success','Successfully Updated.');
			return redirect('users');
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
       $users = User::find($id);

        $users->delete();

/*		 $orgs = User::where('org_id', $id);
		 $orgs->status = '0';
       	 $orgs->save();
*/
\Session::flash('alert-danger','Successfully deleted.');

        return redirect('users');
    }
	
	public function settings($id)
    {
		         
   	  		         $url = env('API_URL')."users/edit/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
		$user = $results->users[0];

            return view('users.settings')->with('user',$user);
		}
		
		
	public function updatePassword(Request $request)
    {
		
		$v = Validator::make($request->all(), [
            'new_password'=>'required|min:6',
			'confirm_password'=>'required|min:6|same:new_password',
			
    ]);

    if ($v->fails())
    {
		 // redirect our user back to the form with the errors from the validator
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
		
			 $data = $request->all();
			 $id =  auth()->user()->id;
   			 
			 
    
        $users = User::find($id);
			$users->password = Hash::make($request->input('new_password'));
			$users->save();
    	
					
			$request->session()->flash('alert-success', 'User Details successfully Updated!');
			//\Session::flash('alert-success','Successfully Updated.');
			   $url = env('API_URL')."users/edit/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
		$user = $results->users[0];

     
			
				return redirect('users/'.$id.'/profile');
	}
    }

	public function profile($id)
    {
        //         $users = User::find($id);
   	  		        $url = env('API_URL')."users/edit/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
		$user = $results->users[0];
		//dd($user);		
 $user->created_at  = date( 'F j, Y, g:i a', strtotime( $user->created_at ) );			
 $user->updated_at  = date( 'F j, Y, g:i a',strtotime( $user->updated_at ) );
 
  $questions = DB::table('security_question')
		->select('security_question.*') 
		->get();
			
				  $userand = DB::table('user_opt_security_question')
		->select('user_opt_security_question.*')
		->where('user_opt_security_question.user_id','=',$id) 
		->get();
//echo '<pre>';print_r($userand);exit;

            return view('users.profile')->with('user',$user)->with('questions',$questions)->with('exuser',$userand);

    }
	public function profileupdate(Request $request, $id)
    {
			
		$v = Validator::make($request->all(), [
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
	    return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
//print_r($request->input());exit;
           $users = User::find($id);
		   $users->firstname = $request->input('firstname');
			$users->lastname = $request->input('lastname');
			$users->middlename = $request->input('middlename');
			$users->phone_number = $request->input('phone_number');
			$users->address_line1 = $request->input('address_line1');
			$users->address_line2 = $request->input('address_line2');
			$users->gender = $request->input('gender');
			$users->city = $request->input('city');
			$users->state = $request->input('state');
			$users->country = $request->input('country');
			$users->zipcode = $request->input('zipcode');
            $users->updated_by = $request->input('updated_by');
			$users->save();
			
			
					
			$request->session()->flash('alert-success', 'User Details successfully Updated!');
			
				return redirect('users/'.$id.'/profile');
	}
    }

	
		public function searchres(Request $request)
{

     $query = $request->input('search');

    $users = DB::table('users as u')
	->where('u.firstname', 'LIKE', '%' . $query . '%')
	->orWhere('u.lastname', 'LIKE', '%' . $query . '%')
	->orWhere('u.email', 'LIKE', '%' . $query . '%')
	->orWhere('roles.role_name', 'LIKE', '%' . $query . '%')
	->join('roles', 'u.role_id', '=', 'roles.role_id')
	->join('users as u1', 'u.created_by', '=', 'u1.id')
	->join('users as u2', 'u.updated_by', '=', 'u2.id')
	->select('u.*', 'roles.role_name as rolename','u1.username as createduser','u2.username as updateduser') 
	->get();
//dd($users);
$orgtype = \DB::table('organizations')->lists('org_name','org_id');
	$roles = \DB::table('roles')->lists('role_name','role_id');						
			return view('users.list')->with('users',$users)->with('orgtype', $orgtype)->with('roles',$roles);	

 }
	public function advancesearch(Request $request)
{
	//print_r($request->input());exit;
	  $query2 = $request->input('role_id');
	    $query3 = $request->input('org_id');
	
$users = DB::table('org_support_details as u')
		->join('users', 'u.user_id', '=', 'users.id')
	->join('roles', 'users.role_id', '=', 'roles.role_id')	
	->join('users as u1', 'u.created_by', '=', 'u1.id')
	->join('users as u2', 'u.updated_by', '=', 'u2.id')
	->where('u.org_id', 'LIKE', '%' . $query3 . '%')
	->Where('users.role_id', 'LIKE', '%' . $query2 . '%')

	->select('u.*','users.*','roles.role_name as rolename','u1.username as createduser','u2.username as updateduser') 
	->get();
//dd($users);

						
		$orgtype = \DB::table('organizations')->lists('org_name','org_id');
	$roles = \DB::table('roles')->lists('role_name','role_id');						
			return view('users.list')->with('users',$users)->with('orgtype', $orgtype)->with('roles',$roles);		


 }
	

	
}
