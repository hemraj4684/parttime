<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Privileges;
use Auth,DB;
use Validator;
use App\Http\Requests;

class PrivilegeController extends Controller
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
			 $url = env('API_URL')."privileges";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $privileges = $results->data;
			 return view('privileges.list')->with('privileges',$privileges);	

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

			 $results = array();
			 $url = env('API_URL')."privileges";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $privileges = $results->data;
			 return view('privileges.create')->with('results',$privileges);	
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
        'privilege_action'   => 'required|max:255|unique:privileges',            
        'privilege_desc'     => 'required|max:255|unique:privileges'        
    );
 $v = Validator::make($request->all(), $rules);

    if ($v->fails())
    {
			 // redirect our user back to the form with the errors from the validator
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
		// validation successful ---------------------------

$priva = $request->input('privilege_desc').'1';
$privb = $request->input('privilege_desc').'1';
$privc = $request->input('privilege_desc').'1';
$privd = $request->input('privilege_desc').'1';
 
            $priv1 = new Privileges;		
			$priv1->privilege_action = 'List';
            $priv1->privilege_desc = $request->input('privilege_desc');
			$priv1->priv_id = str_replace(' ','',$priva);
			$priv1->created_by = $request->input('created_by');
            $priv1->updated_by = $request->input('updated_by');
            $res = $priv1->save();
$priv2 = new Privileges;		
			$priv2->privilege_action = 'Add';
            $priv2->privilege_desc = $request->input('privilege_desc');
			$priv2->priv_id = str_replace(' ','',$privb);
			$priv2->created_by = $request->input('created_by');
            $priv2->updated_by = $request->input('updated_by');
            $res = $priv2->save();

$priv3 = new Privileges;		
			$priv3->privilege_action = 'Edit';
            $priv3->privilege_desc = $request->input('privilege_desc');
			$priv3->priv_id = str_replace(' ','',$privc);
			$priv3->created_by = $request->input('created_by');
            $priv3->updated_by = $request->input('updated_by');
            $res = $priv3->save();

$priv4 = new Privileges;		
			$priv4->privilege_action = 'Delete';
            $priv4->privilege_desc = $request->input('privilege_desc');
			$priv4->priv_id = str_replace(' ','',$privd);
			$priv4->created_by = $request->input('created_by');
            $priv4->updated_by = $request->input('updated_by');
            $res = $priv4->save();
			
			
			
			$request->session()->flash('alert-success', 'Privilege successfully Added!');
			 $results = array();
			 $url = env('API_URL')."privileges";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $list = $results->data;
			 return redirect('privileges/create')->with('results',$list);	

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
        $url = env('API_URL')."privileges/show/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
			$privileges = $results->data[0];
			return view('privileges.show')->with('privileges', $privileges);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
   	  		        $url = env('API_URL')."privileges/edit/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
			 
						$privileges = $results->data[0];
			 $results = array();
			 $url = env('API_URL')."privileges";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $list = $results->data;

			return view('privileges.edit')->with('privileges', $privileges)->with('results',$list);

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
        'privilege_desc'             => 'required',            
        'privilege_desc'         => 'required'        
    );
 $v = Validator::make($request->all(), $rules);
			if ($v->fails())
    {
		// get the error messages from the validator
		 // redirect our user back to the form with the errors from the validator
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
		// validation successful ---------------------------
	
/*			$privileges = Privileges::find($id);
			$privileges->privilege_action = $request->input('privilege_desc');
            $privileges->privilege_desc = $request->input('privilege_desc');
			$privileges->created_by = $request->input('created_by');
            $privileges->updated_by = $request->input('updated_by');
            $res = $privileges->save();
*/			
	
	DB::table('privileges')
			->where('priv_id', '=', $request->input('priv_id'))
            ->update(['privilege_desc' => $request->input('privilege_desc')]);
	
	$request->session()->flash('alert-success', 'Privileges successfully Updated!');
			 $results = array();
			 $url = env('API_URL')."privileges";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $list = $results->data;
			 return redirect('privileges/create')->with('results',$list);	
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
        
	
		 $results = Privileges::find($id);
		
		   $privid = $results->priv_id;
	
			DB::table('privileges')->where('priv_id', $privid)->delete();
		
    	\Session::flash('alert-danger','Successfully deleted.');
			 $results = array();
			 $url = env('API_URL')."privileges";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $privileges = $results->data;
			 return redirect('privileges/create')->with('results',$privileges);	
    }

	public function searchres(Request $request)
{
    // Gets the query string from our form submission 
     $query = $request->input('search');
	//exit;
    // Returns an array of articles that have the query string located somewhere within 
    $pemres = DB::table('privileges')
	->where('privilege_desc', 'LIKE', '%' . $query . '%')
	->join('users as u1', 'privileges.created_by', '=', 'u1.id')
->join('users as u2', 'privileges.updated_by', '=', 'u2.id')
->select('privileges.*', 'u1.username as createduser','u2.username as updateduser') 
->groupBy('privilege_desc')   
	->get();
    // dd($pemres);
	 return view('privileges.create')->with('results',$pemres);	

 }
	
}
