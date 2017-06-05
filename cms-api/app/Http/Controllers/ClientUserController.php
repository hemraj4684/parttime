<?php

namespace App\Http\Controllers;
use App\Models\Client;
use input;
use Response;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Hash,DB,Auth;

class ClientUserController extends Controller
{
	
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
		 try{
			
			 $response = [ 'status'  => '200','clients' => []];
            $statusCode = 200;
			$users = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.role_id')
            ->join('clients', 'users.client_id', '=', 'clients.client_id')
            ->select('users.*', 'roles.name as rolename', 'clients.orgname')
			->where('users.role_id', '!=', '1')
				->where('users.role_id', '!=', '2')
            ->get();
			 $response['clients'] = $users;

        }catch (Exception $e){
            $statusCode = 400;
			$response['status'] = '400';
        }finally{
            return Response::json($response, $statusCode);
        }

		

		

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			
	 $clients = \DB::table('clients')->lists('orgname', 'client_id');
        return view('clientusers.create')->with('clients',$clients);	
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		try{
			
		//echo '<pre>';
		//print_r($request->input());exit;
		    $users = new User;		
			$users->parent_id = $request->input('client_id');;
			$users->client_id = $request->input('client_id');
            $users->role_id = $request->input('role_id');
			$users->username = $request->input('firstname');
			$users->email = $request->input('email');
			$users->password = Hash::make($request->input('password'));
			$users->logins = '0';
			$users->firstname = $request->input('firstname');
			$users->lastname = $request->input('lastname');
			$users->gender = $request->input('gender');
			$users->facebook_id = $request->input('facebook_id');
			$users->twitter_id = $request->input('twitter_id');
			$users->dateofbirth = $request->input('dateofbirth');
			$users->user_created = $request->input('user_created');
            $users->user_updated = $request->input('user_updated');
			$users->active = $request->input('active');;
			$users->status = '1';			
            $resdb = $users->save();
			if($resdb)
			{
	        return Response::json(array(
            'error' => false,
			'status' => 200,
            'message' => 'ClientUSer was successfully Added!'),
            200
        		);
			}else{
				    
					return Response::json(array(
            'error' => true,
			'status' => 400,           
		    'message' => 'Error in saving data.'),
            400
        		);
				}
			
			
		}catch(Exception $e)
		{
			return Response::json(array(
            'error' => true,
			'status' => 400,           
		    'message' => 'Error in saving data.'),
            400
        		);
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
			return view('clientusers.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $users = User::find($id);
 $clients = \DB::table('clients')->lists('orgname', 'client_id');
            return view('clientusers.edit')->with('users',$users)->with('clients',$clients);
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
		
		
		try{
			
			//		echo '<pre>';
		//print_r($request->input());exit;
			$users = User::find($id);
		
			$users->client_id = $request->input('client_id');
            $users->role_id = $request->input('role_id');
			$users->username = $request->input('username');
			$users->email = $request->input('email');
			/*$users->password = Hash::make($request->input('password'));*/
			$users->logins = $request->input('logins');
			$users->firstname = $request->input('firstname');
			$users->lastname = $request->input('lastname');
			$users->gender = $request->input('gender');
			$users->facebook_id = $request->input('facebook_id');
			$users->twitter_id = $request->input('twitter_id');
			$users->dateofbirth = $request->input('dateofbirth');
            $users->user_updated = $request->input('user_updated');
			$users->active = $request->input('active');;
			$users->status = '1';
					
	        $resdb = $users->save();
			if($resdb)
			{
	        return Response::json(array(
            'error' => false,
			'status' => 200,
            'message' => 'User Details successfully Updated!'),
            200
        		);
			}else{
				    
					return Response::json(array(
            'error' => true,
			'status' => 400,           
		    'message' => 'Error in saving data.'),
            400
        		);
				}
			
			
		}catch(Exception $e)
		{
			
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
		//$request->session()->flash('alert-dager', 'User successfully Deleted!');
\Session::flash('alert-danger','Successfully deleted.');

        return redirect('clientusers');
    }
	
	public function settings($id)
    {
       //         $users = User::find($id);
   	  		        $url = env('API_URL')."users/edit/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
		$user = $results->users[0];

            return view('clientusers.settings')->with('users',$user);

    }
	public function profile($id)
    {
        //         $users = User::find($id);
   	  		        $url = env('API_URL')."users/edit/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
		$user = $results->users[0];

            return view('clientusers.profile')->with('users',$user);

    }
}
