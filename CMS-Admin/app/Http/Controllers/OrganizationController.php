<?php

namespace App\Http\Controllers;
//namespace Tjphippen\Docusign;

use Illuminate\Http\Request;
use App\Models\Organizations;
use App\Models\Orgindtypes;
use App\Models\Orgtypes;
use App\Models\User;
use App\Models\OrgBills;
use App\Models\OrgServices;
use App\Models\Services;
use App\Models\Contracts;
use App\Models\Orgaddress;
use App\Models\OrgSupport;

use Auth,Validator;
use DB,Session;
use App\Http\Requests;

class OrganizationController extends Controller
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
       
		try{
			
			 $results = array();
			 $url = env('API_URL')."orgs";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		
		
			 $results = json_decode($result,false);
			 //print_r($results);exit;
			 //$orgs = $results->data;
			 
			 $orgs = $results->data->org;
			$address = $results->data->address;
			$billtype = $results->data->billtype;
			$contract = $results->data->contract;
			$profuser = $results->data->profuser;
			
			
			return view('org.list')
			->with('orgs', $orgs)->with('address', $address)
			->with('billtype', $billtype)->with('contract', $contract)->with('profuser', $profuser);
	

			 //return view('org.list')->with('orgs',$orgs);	

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
		if(isset($_GET['type']))
		{
			//echo 'test';
			//print_r($_POST);exit;
					echo $id1 = $_GET['lat'];
					echo $id2= $_GET['lang'];
					echo $type= $_GET['type'];					
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
        
		  //Session::flush();
		  
		  $country = DB::table('country_phonecodes')->select('country_phonecodes.*')->get();
		 $orgtype = \DB::table('organization_types')->lists('org_type_name','org_type_id');
		 $account_status = \DB::table('account_status')->lists('status_desc','account_status_id');
	    return view('org.create')->with('orgtype',$orgtype)->with('country',$country)->with('acstatus',$account_status);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			//dd($request);
		$rules = array(
        'org_name' => 'required','org_url'=> 'required', 'account_status_id'=> 'required',             
        'org_type_id'=> 'required', 'org_num_employees'=> 'required', 
		'address_line11'=> 'required', 'city1'=> 'required', 
		'state1'=> 'required','zipcode1'=> 'required', 
		'latitude1'=> 'required', 'longitude1'=> 'required', 'telephone1'=> 'required', 
		'email1'=> 'required|email', 'address_1_name'=> 'required', 'address_2_name'=> 'required', 
		'address_line12'=> 'required', 'city2'=> 'required', 
		'state2'=> 'required', 'zipcode2'=> 'required', 
		'latitude2'=> 'required', 'longitude2'=> 'required', 'telephone2'=> 'required', 
		'email2'=> 'required|email',
		'org_logo_image'=> 'required|image|max:30000'
    );
 $v = Validator::make($request->all(), $rules);

    if ($v->fails())
    {
		// get the error messages from the validator
		 // redirect our user back to the form with the errors from the validator
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
		// validation successful ---------------------------

		$varadd = $request->input('address');
		
//$target_path = $_SERVER['DOCUMENT_ROOT'].'/cmsadmin/public/orgimages/';
$target_path = $_SERVER['DOCUMENT_ROOT'].'/public/orgimages/';
   $target_path = $target_path . basename( $_FILES['org_logo_image']['name']); 
$movestatus = move_uploaded_file($_FILES['org_logo_image']['tmp_name'], $target_path);
 $imgname = $_FILES['org_logo_image']['name'];
            $orgs = new Organizations;		
			$orgs->org_name = $request->input('org_name');
			$orgs->org_url = $request->input('org_url');
			$orgs->account_status_id = $request->input('account_status_id');
			$orgs->org_type_id = $request->input('org_type_id');
			$orgs->org_headquarters = $request->input('org_headquarters');
			$orgs->org_num_employees = $request->input('org_num_employees');
			$orgs->org_annual_budget = $request->input('org_annual_budget');
			$orgs->org_logo_image = $imgname;
			$orgs->org_facebook = $request->input('org_facebook');
			$orgs->org_twitter = $request->input('org_twitter');
			$orgs->created_by = $request->input('created_by');
            $orgs->updated_by = $request->input('updated_by');
			$orgs->status = '1';
            $res = $orgs->save();
			$last_org = $orgs['org_id'];
			$loop = $request->input('loop');
			//update unique org id
			$org_unique_id = 'ORG123'.$last_org;
			$uniq = Organizations::find($last_org);		
			$uniq->org_unique_id = $org_unique_id;
			$uniq->save();
			/*echo '<pre>';print_r($varadd);//
			echo $varadd['address_line1'][0];
			exit;*/
			$orgad = new Orgaddress;
			$orgad->org_id = $last_org;
            $orgad->address_name = $request->input('address_1_name');
			$orgad->tele_prefix = $request->input('tele_prefix1');
			$orgad->address_line1 = $request->input('address_line11');
			$orgad->address_line2 = $request->input('address_line21');
			$orgad->city = $request->input('city1');
			$orgad->state = $request->input('state1');
			$orgad->zipcode = $request->input('zipcode1');
			$orgad->latitude = $request->input('latitude1');
			$orgad->longitude = $request->input('longitude1');
			$orgad->telephone = $request->input('telephone1');
			$orgad->fax = $request->input('fax1');
			$orgad->email = $request->input('email1');
			$orgad->created_by = $request->input('created_by');
            $orgad->updated_by = $request->input('updated_by');
            $res = $orgad->save();
			$orgad1 = new Orgaddress;
			$orgad1->org_id = $last_org;
              $orgad1->address_name = $request->input('address_2_name');
			$orgad1->tele_prefix = $request->input('tele_prefix2');
			$orgad1->address_line1 = $request->input('address_line12');
			$orgad1->address_line2 = $request->input('address_line22');
			$orgad1->city = $request->input('city2');
			$orgad1->state = $request->input('state2');
			$orgad1->zipcode = $request->input('zipcode2');
			//$orgad1->latitude = $latitude2[0];
			//$orgad1->longitude = $langitude2[0];
		$orgad1->latitude = $request->input('latitude2');
			$orgad1->longitude = $request->input('longitude2');				
        $orgad1->telephone = $request->input('telephone2');
			$orgad1->fax = $request->input('fax2');
			$orgad1->email = $request->input('email2');
			$orgad1->created_by = $request->input('created_by');
            $orgad1->updated_by = $request->input('updated_by');
            $res1 = $orgad1->save();
			
			$request->session()->put('currentorg', $last_org);
			
			$request->session()->flash('alert-success', 'Organization successfully Added!');
			
		//return redirect('org');
		$orgtype = \DB::table('organizations')->lists('org_name','org_id');
		$roles = \DB::table('roles')->lists('role_name','role_id');		 
        return redirect('orgadmin/create')->with('orgtype',$orgtype)->with('roles',$roles);
	}
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
			
			/*
			$url = env('API_URL')."orgs/show/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
			 
			$orgs = $results->data->org[0];
			$address = $results->data->address;
			$services = $results->data->services;
			$billtype = $results->data->billtype;
			$contract = $results->data->contract;
			$profuser = $results->data->profuser;
			
			
			return view('org.show')
			->with('orgs', $orgs)->with('address', $address)->with('services', $services)
			->with('billtype', $billtype)->with('contract', $contract)->with('profuser', $profuser);
	*/

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	   $url = env('API_URL')."orgs/edit/$id";
	$result = $this->httpGet($url);
	$results = json_decode($result,false);
	$orgs = $results->data->org[0];
	$address1 = $results->data->address[0];//dd($address1);
	$address2 = $results->data->address[1];
	
   $services = Services::where('status', 1)
               ->take(10)
               ->get();
		$orgservices = DB::table('org_services')
->join('services as s', 'org_services.service_id', '=', 's.service_id')
->select('s.*','org_services.*')
->where('org_services.org_id','=',$id)
 ->where('org_services.status', '=', 1)    ->get();
//echo '<pre>'; print_r($orgservices);exit;
$profuser = DB::table('org_support_details')
->join('users as u1', 'org_support_details.user_id', '=', 'u1.id')
->select('u1.username as professional_user','u1.email','u1.phone_number')
->where('org_support_details.org_id','=',$id)    ->get();

	
	$orgtype = \DB::table('organization_types')->lists('org_type_name','org_type_id');
	$account_status = \DB::table('account_status')->lists('status_desc','account_status_id');
	return view('org.edit')->with('orgs', $orgs)->with('address1', $address1)->with('address2', $address2)->with('orgtype',$orgtype)->with('acstatus',$account_status)->with('services',$services)->with('orgservices',$orgservices)->with('profuser',$profuser);

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
        'org_name' => 'required','org_url'=> 'required', 'account_status_id'=> 'required',             
        'org_type_id'=> 'required', 'org_num_employees'=> 'required', 
		'address_line11'=> 'required', 'city1'=> 'required', 
		'state1'=> 'required','zipcode1'=> 'required', 
		'latitude1'=> 'required', 'longitude1'=> 'required', 'telephone1'=> 'required', 
		'email1'=> 'required|email', 'address_1_name'=> 'required', 'address_2_name'=> 'required', 
		'address_line12'=> 'required', 'city2'=> 'required', 
		'state2'=> 'required', 'zipcode2'=> 'required', 
		'latitude2'=> 'required', 'longitude2'=> 'required', 'telephone2'=> 'required', 
		'email2'=> 'required|email',
		'org_logo_image'=> 'required|image|max:30000',       
		'service_details'=>'required',    
    );
 $v = Validator::make($request->all(), $rules);

    if ($v->fails())
    {
		// get the error messages from the validator
		 // redirect our user back to the form with the errors from the validator
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
		
	//	echo '<pre>';print_r($request->input());exit;
		$target_path = $_SERVER['DOCUMENT_ROOT'].'/cmsadmin/public/orgimages/';
//$target_path = $_SERVER['DOCUMENT_ROOT'].'/public/orgimages/';
   $target_path = $target_path . basename( $_FILES['org_logo_image']['name']); 
$movestatus = move_uploaded_file($_FILES['org_logo_image']['tmp_name'], $target_path);
 $imgname = $_FILES['org_logo_image']['name'];
		// validation successful ---------------------------		
            $orgs = Organizations::find($id);		
			$orgs->org_name = $request->input('org_name');
            $orgs->org_url = $request->input('org_url');
			$orgs->account_status_id = $request->input('account_status_id');
			$orgs->org_type_id = $request->input('org_type_id');
			$orgs->org_headquarters = $request->input('org_headquarters');
			$orgs->org_num_employees = $request->input('org_num_employees');
			$orgs->org_annual_budget = $request->input('org_annual_budget');
			$orgs->org_logo_image = $imgname;
			$orgs->status = $request->input('status');
			$orgs->org_facebook = $request->input('org_facebook');
			$orgs->org_twitter = $request->input('org_twitter');
			$orgs->created_by = $request->input('created_by');
            $orgs->updated_by = $request->input('updated_by');
            $res = $orgs->save();
			 $last_org = $id;
			$ad1 = $request->input('ad1_id');
			$ad2 = $request->input('ad2_id');
			//add unique org id
			$org_unique_id = 'ORG123'.$last_org;
			$uniq = Organizations::find($id);		
			$uniq->org_unique_id = $org_unique_id;
			$uniq->save();
			
			$orgad = Orgaddress::find($ad1);	
			$orgad->address_line1 = $request->input('address_line11');
			$orgad->address_line2 = $request->input('address_line21');
			$orgad->city = $request->input('city1');
			$orgad->state = $request->input('state1');
			$orgad->zipcode = $request->input('zipcode1');
			$orgad->latitude = $request->input('latitude1');
			$orgad->longitude = $request->input('longitude1');
			$orgad->telephone = $request->input('telephone1');
			$orgad->fax = $request->input('fax1');
			$orgad->email = $request->input('email1');
			$orgad->created_by = $request->input('created_by');
            $orgad->updated_by = $request->input('updated_by');
            $res = $orgad->save();
			$orgad1 = Orgaddress::find($ad2);	
			$orgad1->address_line1 = $request->input('address_line12');
			$orgad1->address_line2 = $request->input('address_line22');
			$orgad1->city = $request->input('city2');
			$orgad1->state = $request->input('state2');
			$orgad1->zipcode = $request->input('zipcode2');
			$orgad1->latitude = $request->input('latitude2');
			$orgad1->longitude = $request->input('longitude2');
			$orgad1->telephone = $request->input('telephone2');
			$orgad1->fax = $request->input('fax2');
			$orgad1->email = $request->input('email2');
			$orgad1->created_by = $request->input('created_by');
            $orgad1->updated_by = $request->input('updated_by');
            $res1 = $orgad1->save();
			
			
			$oldlist =$request->input('service_old_ids');
			$newlist =$request->input('service_details');
			foreach($newlist as $row)
			{
				if(in_array($row,$oldlist))
				{
				}else{
					
					$user_favorites = DB::table('org_services')
					->where('org_id', '=', $id)
					->where('service_id', '=', $row)
					->first();
				
				if (is_null($user_favorites)) {
					// It does not exist - Create new
					$s1 = new OrgServices;
            	$s1->org_id = $id;
				$s1->service_id = $row;
		    	$s1->created_by = $request->input('created_by');
            	$s1->updated_by = $request->input('updated_by');	
				$s1->status = '1';	
            	$s1->save();
				} else {
					// It exists -Status Update
					OrgServices::where('org_id', $id)
				  ->where('service_id', $row)
				  ->update(['status' => 1]);
				}
				
				}
			}
			foreach($oldlist as $row)
			{
				if(in_array($row,$newlist))
				{
				}else{
					OrgServices::where('org_id', $id)
				  ->where('service_id', $row)
				  ->update(['status' => 0]);
					
				}
			}
			
			
			$request->session()->flash('alert-success', 'Organization successfully Updated!');
		return redirect('org');
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
     	 $a1 = Organizations::where('org_id', '=', $id)->update(['status' => 0]);
		 $a2 = User::where('org_id', '=', $id)->update(['status' => 0]);
		 $a3 = OrgBills::where('org_id', '=', $id)->update(['status' => 0]);
		 $a4 = OrgServices::where('org_id', '=', $id)->update(['status' => 0]);
		 $a5 = OrgSupport::where('org_id', '=', $id)->update(['status' => 0]);
		 $a6 = Contracts::where('org_id', '=', $id)->update(['status' => 0]);
		 
    	\Session::flash('alert-danger','Successfully deleted.');
        return redirect('org');
    }
	public function map()
    {
		return view('org.map');
	}
	public function searchres(Request $request)
{
//	dd($request->input());
    // Gets the query string from our form submission 
    $query = $request->input('search');
    // Returns an array of articles that have the query string located somewhere within 
    $orggs = DB::table('organizations')
	->where('org_name', 'LIKE', '%' . $query . '%')
	->orWhere('org_unique_id', 'LIKE', '%' . $query . '%')
	->orWhere('org_headquarters', 'LIKE', '%' . $query . '%')
	->paginate(10);


			 $results = array();
			 $url = env('API_URL')."orgs";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		
		
			 $results = json_decode($result,false);
			 //print_r($results);exit;
			 //$orgs = $results->data;
			 
			 $orgs = $orggs;
			$address = $results->data->address;
			$billtype = $results->data->billtype;
			$contract = $results->data->contract;
			$profuser = $results->data->profuser;
			
			
			return view('org.list')
			->with('orgs', $orgs)->with('address', $address)
			->with('billtype', $billtype)->with('contract', $contract)->with('profuser', $profuser);
	


 }
	public function advancesearch(Request $request)
{
//	dd($request->input());
    // Gets the query string from our form submission 
    $query1 = $request->input('org');
	 $query2 = $request->input('orgunique');
	  $query3 = $request->input('headquarter');
    // Returns an array of articles that have the query string located somewhere within 
    $orggs = DB::table('organizations')
	->where('org_name', 'LIKE', '%' . $query1 . '%')
	->Where('org_unique_id', 'LIKE', '%' . $query2 . '%')
	->Where('org_headquarters', 'LIKE', '%' . $query3 . '%')
	->paginate(10);


			 $results = array();
			 $url = env('API_URL')."orgs";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		
		
			 $results = json_decode($result,false);
			 //print_r($results);exit;
			 //$orgs = $results->data;
			 
			 $orgs = $orggs;
			$address = $results->data->address;
			$billtype = $results->data->billtype;
			$contract = $results->data->contract;
			$profuser = $results->data->profuser;
			
			
			return view('org.list')
			->with('orgs', $orgs)->with('address', $address)
			->with('billtype', $billtype)->with('contract', $contract)->with('profuser', $profuser);
	


 }
 public function decide(Request $request)
    {
		print_r($request->input());
		$delete = $request->input('delete');
		$save = $request->input('save');
		if(isset($save))
		{
			return redirect('org');
		}
		
		if(isset($delete))
		{
				$id = $request->input('org_id');
				
		 $a1 = Organizations::where('org_id', '=', $id)->delete();
		 $a2 = User::where('org_id', '=', $id)->delete();
		 //$a3 = OrgBills::where('org_id', '=', $id)->delete();
		 $a4 = OrgServices::where('org_id', '=', $id)->delete();
		 $a5 = OrgSupport::where('org_id', '=', $id)->delete();
		 $a6 = Contracts::where('org_id', '=', $id)->delete();
		 
		 \Session::flash('alert-danger','Successfully deleted.');
        return redirect('org');
		}
		
	}
 /**
     * Display a Review of org details.
     */
    public function review(Request $request)
    {
		try{
			$value = $request->session()->get('currentorg');
			if(!isset($value))
			{
				$value = '22';
			}
			$orgid = $value;
$orgs = DB::table('organizations')
->join('users as u1', 'organizations.created_by', '=', 'u1.id')
->join('users as u2', 'organizations.updated_by', '=', 'u2.id')
->select('organizations.*', 'u1.username as createduser','u2.username as updateduser')
->orderby('organizations.status','DESC')
->where('organizations.org_id','=',$orgid)    ->get();
	
$address = DB::table('orgnization_addresses')
->join('users as u1', 'orgnization_addresses.created_by', '=', 'u1.id')
->join('users as u2', 'orgnization_addresses.updated_by', '=', 'u2.id')
->select('orgnization_addresses.*', 'u1.username as createduser','u2.username as updateduser')
->where('orgnization_addresses.org_id','=',$orgid) ->get();


$contract = DB::table('org_contracts')
->join('services as s', 'org_contracts.service_id', '=', 's.service_id')
->join('organizations as u2', 'org_contracts.org_id', '=', 'u2.org_id')
->select('s.service_name','org_contracts.*','u2.org_name')
->where('org_contracts.org_id','=',$orgid)
->get();

$profuser = DB::table('org_support_details')
->join('users as u1', 'org_support_details.user_id', '=', 'u1.id')
->select('org_support_details.*','u1.username as professional_user','u1.email','u1.phone_number')
->where('org_support_details.org_id','=',$orgid)
->get();

			return view('org.review')
			->with('orgs', $orgs)->with('address', $address)
			->with('contract', $contract)->with('profuser', $profuser)->with('curorg',$value);
	

			

		}catch(Exception $e){
			echo $e->getMessage();
			
		}
    }
	
	
	
}
