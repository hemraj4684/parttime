<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permissions;
use Auth,DB;
use Validator;
use App\Http\Requests;

class PermissionsController extends Controller
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
			 $url = env('API_URL')."permissions";
                   dd($url);
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $permissions = $results->data;
			 return view('permissions.list')->with('permissions',$permissions);	

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
			 $url = env('API_URL')."permissions";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $permissions = $results->data;
			 return view('permissions.create')->with('permissions',$permissions);	
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
        'permission_action'             => 'required|max:255|unique:permissions',            
        'permission_desc'         => 'required|max:255|unique:permissions'        
    );
 $v = Validator::make($request->all(), $rules);
 	
    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }
		

		
            $permissions = new Permissions;		
			$permissions->permission_action = $request->input('permission_action');
            $permissions->permission_desc = $request->input('permission_desc');
			$permissions->created_by = $request->input('created_by');
            $permissions->updated_by = $request->input('updated_by');
            $res = $permissions->save();
			$request->session()->flash('alert-success', 'Permission successfully Added!');

			 $results = array();
			 $url = env('API_URL')."permissions";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $permissions = $results->data;
		return redirect('permissions/create')->with('permissions',$permissions);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url = env('API_URL')."permissions/show/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
			$permissions = $results->data[0];
			return view('permissions.show')->with('permissions', $permissions);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

	 $results = array();
	 $url = env('API_URL')."permissions";
	 $result = $this->httpGet($url);
	 //echo '<pre>';		print_r($result);exit;
	 $results = json_decode($result,false);
	 $list = $results->data;
  	 $url = env('API_URL')."permissions/edit/$id";
	 $result = $this->httpGet($url);
	 $results = json_decode($result,false);
     dd($results);
	 $permissions = $results->data[0];
	 return view('permissions.edit')->with('permissions', $permissions)->with('results', $list);
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
        'permission_action'             => 'required',            
        'permission_desc'         => 'required'        
    );
 $v = Validator::make($request->all(), $rules);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{


			$permissions = permissions::find($id);
			$permissions->permission_action = $request->input('permission_action');
            $permissions->permission_desc = $request->input('permission_desc');
			$permissions->created_by = $request->input('created_by');
            $permissions->updated_by = $request->input('updated_by');
            $res = $permissions->save();
	$request->session()->flash('alert-success', 'permissions successfully Updated!');

			$results = array();
			 $url = env('API_URL')."permissions";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $permissions = $results->data;
		return redirect('permissions/create')->with('permissions',$permissions);

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
         $pvroles = permissions::where('permission_id', $id);
       	 $pvroles->delete();
    	\Session::flash('alert-danger','Successfully deleted.');
$results = array();
			 $url = env('API_URL')."permissions";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $permissions = $results->data;
		return redirect('permissions/create')->with('permissions',$permissions);
    }

	public function searchres(Request $request)
{
    // Gets the query string from our form submission 
     $query = $request->input('search');
	//exit;
    // Returns an array of articles that have the query string located somewhere within 
    $pemres = DB::table('permissions')
	->where('permission_action', 'LIKE', '%' . $query . '%')
	->orWhere('permission_desc', 'LIKE', '%' . $query . '%')
	->join('users as u1', 'permissions.created_by', '=', 'u1.id')
->join('users as u2', 'permissions.updated_by', '=', 'u2.id')
->select('permissions.*', 'u1.username as createduser','u2.username as updateduser') 
	->get();
    // dd($pemres);

	 return view('permissions.create')->with('permissions',$pemres);	

 }

	
}