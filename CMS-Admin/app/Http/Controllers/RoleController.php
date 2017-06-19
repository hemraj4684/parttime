<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Privileges;
use App\Models\Permissions;
use App\Models\Permission;
use App\Models\RolePermission;
use App\Models\Privilegeroles;
use App\Models\Permissionroles;
use Hash,DB;
use Auth;
use Validator;

use App\Http\Requests;

class RoleController extends Controller
{
	
    /**
     * 	Create a new controller instance.
     *
     * @return void
     */
    public $rolePer = array();
    private $permModel, $org_id, $user_id;
    private $perm;
    
    public function __construct(){
        $this->permModel = new RolePermission();
        $this->perm = new Permission();
        $this->org_id = Auth::user()->org_id;
        $this->user_id = Auth::user()->id;
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		try{
		$privileges = Privileges ::all();
		$permissions = Permissions ::all();
		
		$url = env('API_URL')."roles";
		$result = $this->httpGet($url);
		 //echo '<pre>';		print_r($result);exit;
		$results = json_decode($result,false);
		$list = $results->data;
		
					 
        return view('roles.list',compact('routeName'))->with('privileges',$privileges)->with('permissions',$permissions)->with('rolelist',$list);	

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
		$privileges = Privileges ::all();
		$permissions = Permissions ::all();
		
			  $url = env('API_URL')."roles";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $list = $results->data;
			 $routeName = $this->perm->allrouteName();	 		
					 
        return view('roles.create',compact('routeName'))->with('privileges',$privileges)->with('permissions',$permissions)->with('rolelist',$list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		$v = Validator::make($request->all(), [
            'role_name' => 'required|max:255|unique:roles',
            'role_desc' => 'required|max:225',
			'role_type' => 'required|max:225',
			'privilegelist'=>'required',
			'permis_details'=>'required',
    ]);

    if ($v->fails())
    {
	// get the error messages from the validator
		 // redirect our user back to the form with the errors from the validator
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
		// validation successful ---------------------------
           $roles = new Role;		
			$roles->role_name = $request->input('role_name');
            $roles->role_desc = $request->input('role_desc');
			$roles->role_type = $request->input('role_type');
			$roles->created_by = $request->input('created_by');
			$roles->updated_by = $request->input('updated_by');
            $res = $roles->save();
			
			$pvlist =$request->input('privilegelist');
			$pmlist =$request->input('permis_details');
			 $last_pid = $roles->role_id;
 			$i=0;
			//dd($pvlist);
			
			foreach($pvlist as $pvroles)
			{
				//print_r($pvroles);exit;
				$poid = $pvroles;
				$pvroles = new Privilegeroles;		
				$pvroles->privilege_id = $poid;
				$pvroles->role_id = $last_pid;
				$pvroles->created_by = $request->input('created_by');
				$pvroles->updated_by = $request->input('updated_by');				
				$pvroles->save();
			}
			foreach($pmlist as $row)
			{ $poid = $row;
				
				$pmroles = new Permissionroles;		
				$pmroles->permission_id = $poid;
				$pmroles->role_id = $last_pid;
				$pmroles->created_by = $request->input('created_by');
				$pmroles->updated_by = $request->input('updated_by');				
				$pmroles->save();

			}
		$request->session()->flash('alert-success', 'Role successfully Added!');

$url = env('API_URL')."roles";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $list = $results->data;
			 
		return redirect('roles/create')->with('rolelist',$list);;
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
        $url = env('API_URL')."roles/show/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
			$role = $results->data[0];
			return view('roles.show')->with('role', $role);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
   	  	
					
$url = env('API_URL')."roles/edit/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
			$role = $results->data[0];
$permissionroles = DB::table('permissionroles')
 ->where('role_id', '=', $id)        
            ->get();
			
			$privilegeroles = DB::table('privilegeroles')
 ->where('role_id', '=', $id)        
            ->get();			

				
			$privileges = Privileges ::all();
		$permissions = Permissions ::all();		
					
				 
				 $url = env('API_URL')."roles";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $list = $results->data;
			 	
			 					 
			return view('roles.edit')->with('roles', $role)->with('privileges', $privileges)->with('permissions',$permissions)->with('privilegeroles',$privilegeroles)->with('permissionroles',$permissionroles)->with('rolelist',$list);

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
		$v = Validator::make($request->all(), [
            'role_name' => 'required|max:255',
            'role_desc' => 'required|max:225',
			'role_type' => 'required|max:225',
			'privilegelist'=>'required',
			'permis_details'=>'required',
    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors());
    }else{
			$roles = Role::find($id);
  			$roles->role_name = $request->input('role_name');
            $roles->role_desc = $request->input('role_desc');
			$roles->role_type = $request->input('role_type');
			$roles->created_by = $request->input('created_by');
			$roles->updated_by = $request->input('updated_by');
            $res = $roles->save();


 			$pvroles = Privilegeroles::where('role_id', $id);
        	$pvroles->delete();
			$pmroles = Permissionroles::where('role_id', $id);
        	$pmroles->delete();
			 
			$pvlist =$request->input('privilegelist');
			$pmlist =$request->input('permis_details');
			echo $last_pid = $id;
 			
			foreach($pvlist as $pvroles)
			{
				//print_r($pvroles);exit;
				$poid = $pvroles;
				$pvroles = new Privilegeroles;		
				$pvroles->privilege_id = $poid;
				$pvroles->role_id = $last_pid;
				$pvroles->created_by = $request->input('created_by');
				$pvroles->updated_by = $request->input('updated_by');				
				$pvroles->save();
			}
			foreach($pmlist as $row)
			{ $poid = $row;
				
				$pmroles = new Permissionroles;		
				$pmroles->permission_id = $poid;
				$pmroles->role_id = $last_pid;
				$pmroles->created_by = $request->input('created_by');
				$pmroles->updated_by = $request->input('updated_by');				
				$pmroles->save();

			}
			 
			 
	$request->session()->flash('alert-success', 'Role successfully Updated!');
$url = env('API_URL')."roles";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $list = $results->data;
			 
			return redirect('roles/create')->with('rolelist',$list);

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
        $roles = Role::find($id);
        $roles->delete();
		 $pvroles = Privilegeroles::where('role_id', $id);
       	 $pvroles->delete();
$url = env('API_URL')."roles";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $list = $results->data;
		
//		$request->session()->flash('alert-dager', 'Successfully Deleted!');
  \Session::flash('alert-danger','Successfully deleted.');
       return redirect('roles/create')->with('rolelist',$list);;
    }
	
	public function searchres(Request $request)
{
    // Gets the query string from our form submission 
      $query = $request->input('search');
	
    // Returns an array of articles that have the query string located somewhere within 
    $list = DB::table('roles')
	->where('role_name', 'LIKE', '%' . $query . '%')
	->join('users as u1', 'roles.created_by', '=', 'u1.id')
->join('users as u2', 'roles.updated_by', '=', 'u2.id')
->select('roles.*', 'u1.username as createduser','u2.username as updateduser') 
	->get();


		$privileges = Privileges ::all();
		$permissions = Permissions ::all();
        return view('roles.create')->with('privileges',$privileges)->with('permissions',$permissions)->with('rolelist',$list);
 }

}
