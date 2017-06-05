<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\Privileges;
use App\Models\Privilegeroles;
use input;
Use DB;
use Response;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;

class RolesController extends Controller
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
			// $roles = Role::all();

$results = DB::table('roles')
->join('users as u1', 'roles.created_by', '=', 'u1.id')
->join('users as u2', 'roles.updated_by', '=', 'u2.id')
->select('roles.*', 'u1.username as createduser','u2.username as updateduser')           
            ->get();

			 $response['data'] = $results;

			}catch (Exception $e){
				$statusCode = 400;
				$response['status'] = '400';
			}finally{
				return Response::json($response, $statusCode);
			}
    }
	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$test = $request->input();
			$params = json_decode($test[0]);
//			echo '<pre>';print_r($params); 
//			exit;


			return Response::json(array(
				'error' => false,
				'data' => $roles->toArray()),
				200
			);        
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		print_r($request);exit;
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
			 $response['status'] = '200';
            $statusCode = 200;
			 $role = Role::where('role_id', $id)
                    ->take(1)
                    ->get();

                $response['data']=$role;
        }catch (Exception $e){
            $statusCode = 400;
			$response['status'] = '400';
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
			 $response = ['status'  => '200','roles' => []      ];
            $statusCode = 200;
			 $role = Role::where('role_id', $id)
                    ->take(1)
                    ->get();
					$privileges = Privileges::all();
					$role_privileges = DB::table('privilegeroles')
->join('privileges as p1', 'privilegeroles.privilege_id', '=', 'p1.privilege_id')
->select('privilegeroles.*', 'p1.privilege_action')
 ->where('privilegeroles.role_id', '=', $id)        
            ->get();
					
					//->find_all();	
				//dd($privileges);
                $response['data']=$role;
				 $response['privileges']=$privileges;
				 $response['role_privileges']=$role_privileges;
        }catch (Exception $e){
            $statusCode = 400;
			$response['status'] ='400';
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
		try
		{
			$roles = Role::find($id);
  			$roles->role_name = $request->input('role_name');
            $roles->role_desc = $request->input('role_desc');
			$roles->user_created = $request->input('user_created');
            $roles->user_updated = $request->input('user_updated');
            $roles->save();
			$pvlist =$request->input('privilegelist');
 //dd($pvlist);
 			// code to delete existing privilegeroles'
			//start
			 echo $id;
			 $pvroles = Privilegeroles::where('role_id', $id);
        	 $pvroles->delete();

			//end
 			$i=0;
			foreach($pvlist as $key =>$pvroles)
			{
				$pvroles = new Privilegeroles;		
				$pvroles->privilege_id = $pvlist[$i];
				$pvroles->role_id = $roles->role_id;
				$pvroles->user_created = $request->input('user_created');
				$pvroles->user_updated = $request->input('user_updated');
				$pvroles->save();
			$i++;
			}

		}catch(\Exception $e){
		}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($role_id)
    {
	 $role = Role::find($role_id);

        $role->delete();

        return Response::json(array(
            'error' => false,
            'message' => 'Role Deleted'),
            200
        );
    }
}
