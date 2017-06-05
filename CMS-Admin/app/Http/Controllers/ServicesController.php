<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Http\Requests;
use DB,Auth;
use Validator;

class ServicesController extends Controller
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
			 $url = env('API_URL')."services";
			 $result = $this->httpGet($url);
			// echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $services = $results->data;
			
	
      	  return view('services.list')->with('services',$services);  
		} catch(Exception $e){
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
		 $url = env('API_URL')."services";
			 $result = $this->httpGet($url);
			// echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $services = $results->data;
         return view('services.create')->with('list',$services); 
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
        'service_name' => 'required|max:255|unique:services',            
        'service_desc' => 'required|max:255s'        
    );
 $v = Validator::make($request->all(), $rules);

    if ($v->fails())
    {
		     return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
	
			if ($request->isMethod('post')) {
			$target_path = $_SERVER['DOCUMENT_ROOT'].'/cmsadmin/public/services/';
			//$target_path = $_SERVER['DOCUMENT_ROOT'].'/public/services/';
			   $target_path = $target_path . basename( $_FILES['service_logo']['name']); 
			$movestatus = move_uploaded_file($_FILES['service_logo']['tmp_name'], $target_path);
			 $imgname = $_FILES['service_logo']['name'];

			$invalues = $request->input();
			$invalues['service_logo'] = $imgname;
			 $input = json_encode($invalues);
			// dd($input);
			 
   	          $url = env('API_URL')."services/store";
			 $result = $this->httpPost($input,$url,'POST');
			 //echo '<pre>';		print_r($result);exit;
			 if($request->status == 200)
			 {
				 $request->session()->flash('alert-success',$request->message );
			 }else{
				 $request->session()->flash('alert-danger',$request->message);	 
			 }
		 
		 $lurl = env('API_URL')."services";
			 $lresult = $this->httpGet($lurl);
			// echo '<pre>';		print_r($result);exit;
			 $lresults = json_decode($lresult,false);
			 $lservices = $lresults->data;
			return redirect('services/create')->with('list',$lservices);
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
		
		 	$url = env('API_URL')."services/show/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
			 $services = $results->data[0];
       return view('services.show')->with('services', $services);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		 $eurl = env('API_URL')."services";
			 $eresult = $this->httpGet($eurl);
			// echo '<pre>';		print_r($result);exit;
			 $eresults = json_decode($eresult,false);
			 $eservices = $eresults->data;
        $url = env('API_URL')."services/edit/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
			 $services = $results->data[0];

         return view('services.edit')->with('list',$eservices)->with('services',$services);
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
        'service_name' => 'required|max:255',            
        'service_desc' => 'required|max:255'        
    );
 $v = Validator::make($request->all(), $rules);

    if ($v->fails())
    {
		     return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
			
$target_path = $_SERVER['DOCUMENT_ROOT'].'/cmsadmin/public/services/';
//$target_path = $_SERVER['DOCUMENT_ROOT'].'/public/services/';
   $target_path = $target_path . basename( $_FILES['service_logo']['name']); 
$movestatus = move_uploaded_file($_FILES['service_logo']['tmp_name'], $target_path);
 $imgname = $_FILES['service_logo']['name'];

$invalues = $request->input();
$invalues['service_logo'] = $imgname;
			 $input = json_encode($invalues);
			
			 
   	         $url = env('API_URL')."services/update/".$id;
			 $result = $this->httpPost($input,$url,'POST');
			 //echo '<pre>';		print_r($result);exit;
			 if($request->status == 200)
			 {
				 $request->session()->flash('alert-success',$request->message );
			 }else{
				 $request->session()->flash('alert-danger',$request->message);	 
			 }
		 	 $lurl = env('API_URL')."services";
			 $lresult = $this->httpGet($lurl);
			// echo '<pre>';		print_r($result);exit;
			 $lresults = json_decode($lresult,false);
			 $lservices = $lresults->data;
			return redirect('services/create')->with('list',$lservices);
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
        $services = Services::find($id);
		$services->delete();
		\Session::flash('alert-danger','Successfully deleted.');
		 $lurl = env('API_URL')."services";
			 $lresult = $this->httpGet($lurl);
			// echo '<pre>';		print_r($result);exit;
			 $lresults = json_decode($lresult,false);
			 $lservices = $lresults->data;
			return redirect('services/create')->with('list',$lservices);
		
    }

	public function searchres(Request $request)
{
//	dd($request->input());
    // Gets the query string from our form submission 
    $query = $request->input('search');
    // Returns an array of articles that have the query string located somewhere within 
    $services = DB::table('services')
	->where('service_name', 'LIKE', '%' . $query . '%')
	->orWhere('service_desc', 'LIKE', '%' . $query . '%')
->join('users as u1', 'services.created_by', '=', 'u1.id')
	->join('users as u2', 'services.updated_by', '=', 'u2.id')
	->select('services.*', 'u1.username as createduser','u2.username as updateduser') 

	->get();
			
	
      	  return view('services.list')->with('services',$services);  
	


 }


}

