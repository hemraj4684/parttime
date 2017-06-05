<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contracts;
use Auth;
use DB;use Validator;
use App\Http\Requests;

class ContractsController extends Controller
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
			  $url = env('API_URL')."contracts";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $contracts = $results->data;
			 return view('contracts.list')->with('contracts',$contracts);	

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
	    return view('contracts.create')->with('orgs',$orgtype)->with('services',$result2)->with('curorg',$value);
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
        'contract_title'=>'required',
		'contract_desc'=>'required',
		'contract_doc_file'=>'required'        
    );
 $v = Validator::make($request->all(), $rules);

    if ($v->fails())
    {
			
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
	
//echo $target_path = $_SERVER['DOCUMENT_ROOT'].'/cmsadmin/public/docusign/';exit;
$target_path = $_SERVER['DOCUMENT_ROOT'].'/public/docusign/';
        $filename = basename( $_FILES['contract_doc_file']['name']);
        $stringname = str_replace(' ', '', $filename);
   $target_path = $target_path . $stringname; 
$movestatus = move_uploaded_file($_FILES['contract_doc_file']['tmp_name'], $target_path);
 $docname = $stringname;
            
           $contracts = new Contracts;		
			$contracts->contract_title = $request->input('contract_title');
            $contracts->contract_desc = $request->input('contract_desc');
			$contracts->contract_doc_file = $docname;
			$contracts->doc_sign_url = $docname;
			$contracts->status = '1';
			$contracts->created_by = $request->input('created_by');
            $contracts->updated_by = $request->input('updated_by');
            $res = $contracts->save();		
			
		$request->session()->flash('alert-success', 'Contract successfully Added!');
		return redirect('contracts');
		

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
        $url = env('API_URL')."contracts/show/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
			$contracts = $results->data[0];
			return view('contracts.show')->with('contract', $contracts);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	  $url = env('API_URL')."contracts/edit/$id";
	$result = $this->httpGet($url);
	$results = json_decode($result,false);
	//print_r($results);exit;
	$contracts = $results->data[0];

	return view('contracts.edit')->with('contract', $contracts);

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
        'contract_title'=>'required',
		'contract_desc'=>'required'        
    );
 $v = Validator::make($request->all(), $rules);

    if ($v->fails())
    {
			
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
	
	if (is_uploaded_file($_FILES['contract_doc_file']['tmp_name'])) {
$target_path = $_SERVER['DOCUMENT_ROOT'].'/cmsadmin/public/docusign/';
//$target_path = $_SERVER['DOCUMENT_ROOT'].'/public/docusign/';
   $target_path = $target_path . basename( $_FILES['contract_doc_file']['name']); 
$movestatus = move_uploaded_file($_FILES['contract_doc_file']['tmp_name'], $target_path);
 $docname = $_FILES['contract_doc_file']['name'];
 			
			$contracts = Contracts::find($id);			
			$contracts->contract_title = $request->input('contract_title');
            $contracts->contract_desc = $request->input('contract_desc');
			$contracts->contract_doc_file = $docname;
			$contracts->doc_sign_url = $docname;
			$contracts->status = '1';
			$contracts->created_by = $request->input('created_by');
            $contracts->updated_by = $request->input('updated_by');
            $res = $contracts->save();	
 
 
	}else{
		
		$contracts = Contracts::find($id);			
			$contracts->contract_title = $request->input('contract_title');
            $contracts->contract_desc = $request->input('contract_desc');
			$contracts->status = '1';
			$contracts->created_by = $request->input('created_by');
            $contracts->updated_by = $request->input('updated_by');
            $res = $contracts->save();	
		
		
		}
            
            	
			
		$request->session()->flash('alert-success', 'Contract successfully Added!');
		return redirect('contracts');
		

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
		
		 $a6 = Contracts::where('contract_id', '=', $id)->update(['status' => 0]);
    	\Session::flash('alert-danger','Successfully deleted.');
        return redirect('contracts');
    }

	public function searchres(Request $request)
{

    $query = $request->input('search');
 
    $contracts = DB::table('contracts as con')
	->where('con.contract_title', 'LIKE', '%' . $query . '%')
	->orWhere('con.contract_desc', 'LIKE', '%' . $query . '%')
	->orWhere('con.contract_doc_file', 'LIKE', '%' . $query . '%')	
	->join('users as u1', 'con.created_by', '=', 'u1.id')
	->join('users as u2', 'con.updated_by', '=', 'u2.id')
	->select('con.*','u1.username as createduser','u2.username as updateduser') 
	->get();

			 return view('contracts.list')->with('contracts',$contracts);	
 }

	
	
}
