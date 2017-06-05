<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\OrgServices;
use App\Http\Requests;
use DB,Auth,Validator;

class OrgServiceController extends Controller
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
			 $url = env('API_URL')."orgservices";
			 $result = $this->httpGet($url);
			// echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $services = $results->data;
      	  return view('orgservice.list')->with('services',$services);  
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
		 $subplans = \DB::table('services')->lists('service_name', 'service_id');
		 $orgs = \DB::table('organizations')->lists('org_name', 'org_id');
    return view('orgservice.create')->with('services', $subplans)->with('orgs', $orgs)->with('curorg',$value);
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
        'service_id'         => 'required'        
    );
 $v = Validator::make($request->all(), $rules);

    if ($v->fails())
    {
			 // redirect our user back to the form with the errors from the validator
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
		// validation successful ---------------------------

			
			if ($request->isMethod('post')) {

			 $input = json_encode($request->input());
			 //dd($input);
   	         $url = env('API_URL')."orgservices/store";
			 $result = $this->httpPost($input,$url,'POST');
			 //echo '<pre>';		print_r($result);exit;
			 if($request->status == 200)
			 {
				 $request->session()->flash('alert-success',$request->message );
			 }else{
				 $request->session()->flash('alert-danger',$request->message);	 
			 }
		 
			//return redirect('orgservice');
			 $orgtype = \DB::table('organizations')->lists('org_name','org_id');
		 $result2 = \DB::table('services')->lists('service_name','service_id');
	    return redirect('orgcontracts/create')->with('orgs',$orgtype)->with('services',$result2);
			}
	}
    }

    /**
     * Display the specified resource.
     *
`     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		
		 	$url = env('API_URL')."orgservices/show/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
			 $services = $results->data[0];

       return view('orgservice.show')->with('orgservices', $services);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url = env('API_URL')."orgservices/edit/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
			 $services = $results->data[0];
		 $subplans = \DB::table('services')->lists('service_name', 'service_id');
		 $orgs = \DB::table('organizations')->lists('org_name', 'org_id');
       return view('orgservice.edit')->with('orgservices', $services)->with('services', $subplans)->with('orgs', $orgs);
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
        'service_id'         => 'required'        
    );
 $v = Validator::make($request->all(), $rules);

    if ($v->fails())
    {
			 // redirect our user back to the form with the errors from the validator
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
		// validation successful ---------------------------

			
			 $input = json_encode($request->input());
   	         $url = env('API_URL')."orgservices/update/".$id;
			 $result = $this->httpPost($input,$url,'POST');
			 //echo '<pre>';		print_r($result);exit;
			 if($request->status == 200)
			 {
				 $request->session()->flash('alert-success',$request->message );
			 }else{
				 $request->session()->flash('alert-danger',$request->message);	 
			 }
		 
			return redirect('orgservice');
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
       /* $services = OrgServices::find($id);
		$services->delete();
		*/
	
		 $a4 = OrgServices::where('org_ser_id', '=', $id)->update(['status' => 0]);

		\Session::flash('alert-danger','Successfully deleted.');
		return redirect('orgservice');
    }

}
