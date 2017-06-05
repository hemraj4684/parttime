<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contracts;
use App\Models\OrgContracts;
use Auth,DB,Validator;
use App\Http\Requests;

class OrgContractsController extends Controller
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
			 $results = array();
			  $url = env('API_URL')."orgcontracts";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $contracts = $results->data;
			 return view('orgcontracts.list')->with('contracts',$contracts);	

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
		 $result2 = \DB::table('services')->lists('service_name','service_id');
        $contracts = \DB::table('contracts')->lists('contract_title','contract_id');
	    return view('orgcontracts.create')->with('orgs',$orgtype)->with('services',$result2)->with('contracts',$contracts)->with('curorg',$value);
    }
	
	public function addcontract(Request $request)
    {
	
		 $orgtype = \DB::table('organizations')->lists('org_name','org_id');
		 $result2 = \DB::table('services')->lists('service_name','service_id');
          $contracts = \DB::table('contracts')->lists('contract_title','contract_id');
	    return view('orgcontracts.addcontract')->with('orgs',$orgtype)->with('services',$result2)->with('contracts',$contracts);
		
    }
	
	public function saveuser(Request $request)
    {
		
	$rules = array(
		'contract_start_date'     => 'required',            
		'contract_end_date'   => 'required' ,
		'org_id'    => 'required' , 
		'service_id'=>'required',
		'contract_id'=>'required',
		'status'   => 'required'        
	);
 $v = Validator::make($request->all(), $rules);

    if ($v->fails())
    {
			 // redirect our user back to the form with the errors from the validator
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
		// validation successful ---------------------------

        $stDate = $request->input('contract_start_date');
 $start = date("Y-m-d",strtotime($stDate));
        $edDate = $request->input('contract_end_date');
 $end = date("Y-m-d",strtotime($edDate));
      
           $contracts = new OrgContracts;		
			$contracts->contract_start_date = $start;
            $contracts->contract_end_date = $end;
			$contracts->status = $request->input('status');
			$contracts->org_id = $request->input('org_id');
			$contracts->service_id = $request->input('service_id');
			$contracts->contract_id = $request->input('contract_id');
			$contracts->created_by = $request->input('created_by');
            $contracts->updated_by = $request->input('updated_by');
            $res = $contracts->save();		
			
		$request->session()->flash('alert-success', 'Org Contract successfully Added!');
		 
        return redirect('orgcontracts');

	}
    
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
        'contract_start_date'             => 'required',            
        'contract_end_date'         => 'required' ,
		  'org_id'         => 'required' , 
		  'service_id'=>'required',
		  'contract_id'=>'required',
		'status'         => 'required'        
    );
 $v = Validator::make($request->all(), $rules);

    if ($v->fails())
    {
			 // redirect our user back to the form with the errors from the validator
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
		// validation successful ---------------------------

        $stDate = $request->input('contract_start_date');
 $start = date("Y-m-d",strtotime($stDate));
        $edDate = $request->input('contract_end_date');
 $end = date("Y-m-d",strtotime($edDate));
      
           $contracts = new OrgContracts;		
			$contracts->contract_start_date = $start;
            $contracts->contract_end_date = $end;
			$contracts->status = $request->input('status');
			$contracts->org_id = $request->input('org_id');
			$contracts->service_id = $request->input('service_id');
			$contracts->contract_id = $request->input('contract_id');
			$contracts->created_by = $request->input('created_by');
            $contracts->updated_by = $request->input('updated_by');
            $res = $contracts->save();		
			
		$request->session()->flash('alert-success', 'Org Contract successfully Added!');
	//return redirect('orgcontracts');
		$orgtype = \DB::table('organizations')->lists('org_name','org_id');
		$roles = \DB::table('users')->where('role_id', '2')->lists('username','id');		 
        return redirect('orgsupport/create')->with('orgtype',$orgtype)->with('roles',$roles);
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
        $url = env('API_URL')."orgcontracts/show/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
			$contracts = $results->data[0];
			return view('orgcontracts.show')->with('contract', $contracts);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	  $url = env('API_URL')."orgcontracts/edit/$id";
	$result = $this->httpGet($url);
	$results = json_decode($result,false);
	$contracts = $results->data[0];
//echo '<pre>';	print_r($contracts);exit;
	$orgtype = \DB::table('organizations')->lists('org_name','org_id');
 $result2 = \DB::table('services')->lists('service_name','service_id');
         $res_contracts = \DB::table('contracts')->lists('contract_title','contract_id');
	return view('orgcontracts.edit')->with('contract', $contracts)->with('orgs',$orgtype)->with('services',$result2)->with('res_contracts',$res_contracts);

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
        'contract_start_date' => 'required',            
        'contract_end_date'  => 'required' ,
		  'org_id'  => 'required' , 
		  'service_id'=>'required',
             'contract_id'=>'required',
		'status'  => 'required'        
    );
 $v = Validator::make($request->all(), $rules);

    if ($v->fails())
    {
		
			 // redirect our user back to the form with the errors from the validator
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
		// validation successful ---------------------------
		 
		  $stDate = $request->input('contract_start_date');
 $start = date("Y-m-d",strtotime($stDate));
        $edDate = $request->input('contract_end_date');
 $end = date("Y-m-d",strtotime($edDate));
      
            $contracts = OrgContracts::find($id);		
			$contracts->contract_start_date = $start;
            $contracts->contract_end_date = $end;
			$contracts->status = $request->input('status');
			$contracts->org_id = $request->input('org_id');
			$contracts->contract_id = $request->input('contract_id');
			$contracts->service_id = $request->input('service_id');
			$contracts->created_by = $request->input('created_by');
            $contracts->updated_by = $request->input('updated_by');
            $res = $contracts->save();
			
			
			
			$request->session()->flash('alert-success', 'Org Contract successfully Updated!');
		return redirect('orgcontracts');

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
       /*  $contracts = Contracts::where('contract_id', $id);
       	 $contracts->delete();
		*/ 
		
		 $a6 = OrgContracts::where('org_con_id', '=', $id)->update(['status' => 0]);
    	\Session::flash('alert-danger','Successfully deleted.');
        return redirect('orgcontracts');
    }

	public function searchres(Request $request)
{

    $query = $request->input('search');
 
    $contracts = DB::table('OrgContracts')
	->where('s.service_name', 'LIKE', '%' . $query . '%')
	->orWhere('org.org_name', 'LIKE', '%' . $query . '%')
	->join('organizations as org', 'contracts.org_id', '=', 'org.org_id')
	->join('services as s', 'contracts.service_id', '=', 's.service_id')
	->join('users as u1', 'contracts.created_by', '=', 'u1.id')
	->join('users as u2', 'contracts.updated_by', '=', 'u2.id')
	->select('contracts.*','s.service_name','org.org_name', 'u1.username as createduser','u2.username as updateduser') 
	->get();

			 return view('orgcontracts.list')->with('contracts',$contracts);	
 }

	
	
}
