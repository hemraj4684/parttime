<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BillingType;
use App\Models\OrgBills;
use App\Models\Organizations;
use Auth, Validator;
use App\Http\Requests;

class OrgBillsController extends Controller
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
			  $url = env('API_URL')."orgbills";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $orgbills = $results->data;
			 return view('orgbills.list')->with('orgbills',$orgbills);	

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
		 $result2 = \DB::table('billing_types')->lists('bill_type','bill_type_id');
	    return view('orgbills.create')->with('orgs',$orgtype)->with('bill_type',$result2)->with('curorg',$value);
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
        'org_id'   => 'required',            
        'bill_type_id'     => 'required'        
    );
 $v = Validator::make($request->all(), $rules);

    if ($v->fails())
    {
			 // redirect our user back to the form with the errors from the validator
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
		// validation successful ---------------------------
            $orgbills = new orgbills;		
			$orgbills->org_id = $request->input('org_id');
            $orgbills->bill_type_id = $request->input('bill_type_id');
			$orgbills->created_by = $request->input('created_by');
            $orgbills->updated_by = $request->input('updated_by');
			$orgbills->status = '1';
            $res = $orgbills->save();
			$request->session()->flash('alert-success', 'Successfully Added!');
			
			 
        return redirect('orgbills');

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
        $url = env('API_URL')."orgbills/show/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
			$orgbills = $results->data[0];
			
			
			return view('orgbills.show')->with('orgbills', $orgbills);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
   	  		        $url = env('API_URL')."orgbills/edit/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
						$orgbills = $results->data[0];
						
						$orgtype = \DB::table('organizations')->lists('org_name','org_id');
		 $result2 = \DB::table('billing_types')->lists('bill_type','bill_type_id');
	   
			return view('orgbills.edit')->with('orgbills', $orgbills)->with('orgs',$orgtype)->with('bill_type',$result2);

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
        'org_id'   => 'required',            
        'bill_type_id'     => 'required'        
    );
 $v = Validator::make($request->all(), $rules);

    if ($v->fails())
    {
			 // redirect our user back to the form with the errors from the validator
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
		// validation successful ---------------------------		
			$orgbills = orgbills::find($id);
			$orgbills->org_id = $request->input('org_id');
            $orgbills->bill_type_id = $request->input('bill_type_id');
			$orgbills->created_by = $request->input('created_by');
            $orgbills->updated_by = $request->input('updated_by');
			$orgbills->status = $request->input('status');
            $res = $orgbills->save();
			$request->session()->flash('alert-success', 'Successfully Updated!');
			return redirect('orgbills');

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
       $a3 = OrgBills::where('org_id', '=', $id)->update(['status' => 0]);

		
    	\Session::flash('alert-danger','Successfully deleted.');
        return redirect('orgbills');
    }

	
	

}
