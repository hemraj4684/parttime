<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\OrgSupport;
use App\Models\Role;
use input;use DB;
use Response;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;

class OrgSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
		 try{
			
			 $response['status'] = '200';
             $statusCode = 200;
	        
				$users = DB::table('org_support_details')
            ->join('organizations as org', 'org_support_details.org_id', '=', 'org.org_id')
			->join('users as um', 'org_support_details.user_id', '=', 'um.id')
          	->join('users as u1', 'org_support_details.created_by', '=', 'u1.id')
			->join('users as u2', 'org_support_details.updated_by', '=', 'u2.id')
            ->select('org_support_details.*','um.*', 'org.org_name','u1.username as createduser','u2.username as updateduser')
->orderby('org_support_details.status','DESC')
			->get();	

					
			 $response['users'] = $users;

        }catch (Exception $e){
            $statusCode = 400;
			$response['sttus'] = '400';
			echo $e->getMessage();
        }
		finally{
            return Response::json($response, $statusCode);
        }
		
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      try{
			 $response = ['status'  => '200','users' => []];
            $statusCode = 200;
			 $users = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.role_id')
          	->join('users as u1', 'users.created_by', '=', 'u1.id')
			->join('users as u2', 'users.updated_by', '=', 'u2.id')
            ->select('users.*', 'roles.role_name as rolename','u1.username as createduser','u2.username as updateduser')
			->where('users.id','=',$id)
			->get();	
					

				$response['users'] = $users;
            
        }catch (Exception $e){
            $statusCode = 400;
			$response = [
              'status'  => '400'			  
            ];
        }finally{
            return Response::json($response, $statusCode);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       try{
			 $response = ['status'  => '200','users' => []      ];
            $statusCode = 200;
			  $users = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.role_id')
          	->join('users as u1', 'users.created_by', '=', 'u1.id')
			->join('users as u2', 'users.updated_by', '=', 'u2.id')
            ->select('users.*', 'roles.role_name as rolename','u1.username as createduser','u2.username as updateduser')
			->where('users.id','=',$id)
			->get();	
				$response['users'] = $users;
            
        }catch (Exception $e){
            $statusCode = 400;
			$response = [
              'status'  => '400'			  
            ];
        }finally{
            return Response::json($response, $statusCode);
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
