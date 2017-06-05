<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Auth;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		/*$results = array();
		 $results['users'] = DB::table('users')->count();
		 $results['messages'] = DB::table('messages')->count();
		 $results['contacts'] = DB::table('contacts')->count();
		 $results['clients'] = DB::table('clients')->count();
		 $results['triggers'] = DB::table('triggers')->count();
		 $results['subscribes'] = DB::table('subscrptions')->count();
		
			
		$useremail = Auth::user()->email;
		 $role_id = Auth::user()->role_id;

        return view('dashboard.web')->with('results', $results);*/
		return view('dashboard.web');
    }
	public function weather()
    {
      	  	$useremail = Auth::user()->email;
			$role_id = Auth::user()->role_id;

					 
			 $url = env('API_URL')."roles/show/$role_id";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
						$role = $results->data[0];

        return view('dashboard.weather')->with('role', $role);
    }
	public function reports()
    {
$useremail = Auth::user()->email;
$role_id = Auth::user()->role_id;
		
		$url = env('API_URL')."roles/show/$role_id";
		$result = $this->httpGet($url);
		//echo '<pre>';		print_r($result);exit;
		$results = json_decode($result,false);
		$role = $results->data[0];
		return view('dashboard.reports')->with('role', $role);
		
    }
	public function web() {

		
			
$useremail = Auth::user()->email;
 $role_id = Auth::user()->role_id;

        return view('dashboard.web');
    
    }
	public function help() {
		 return view('dashboard.help');
	}
}
