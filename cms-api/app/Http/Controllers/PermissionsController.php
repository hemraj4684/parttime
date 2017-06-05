<?php

namespace App\Http\Controllers;
use App\Models\Permissions;
use input,DB,Response,Session;
use Illuminate\Http\Request;
use App\Http\Requests;

class PermissionsController extends Controller
{

    public function index()
    {

         try{
			 $response['status'] = '200';
             $statusCode = 200;

$results = DB::table('permissions')
->join('users as u1', 'permissions.created_by', '=', 'u1.id')
->join('users as u2', 'permissions.updated_by', '=', 'u2.id')
->select('permissions.*', 'u1.username as createduser','u2.username as updateduser')           
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
     * @param  int  $id
     */
    public function show($id)
    {
  		 try{
			 $response['status'] = '200';
            $statusCode = 200;
$result = DB::table('permissions')
->join('users as u1', 'permissions.created_by', '=', 'u1.id')
->join('users as u2', 'permissions.updated_by', '=', 'u2.id')
->select('permissions.*', 'u1.username as createduser','u2.username as updateduser')           
       ->where('permissions.permission_id','=',$id)
	        ->get();

                $response['data']=$result;
        }catch (Exception $e){
            $statusCode = 400;
			$response['status'] = '400';
        }finally{
            return Response::json($response, $statusCode);
        }

    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     */
    public function edit($id)
    {
        
  		 try{
			 $response = ['status'  => '200','roles' => []      ];
            $statusCode = 200;

$result = DB::table('permissions')
->join('users as u1', 'permissions.created_by', '=', 'u1.id')
->join('users as u2', 'permissions.updated_by', '=', 'u2.id')
->select('permissions.*', 'u1.username as createduser','u2.username as updateduser')           
       ->where('permissions.permission_id','=',$id)
	        ->get();
			     $response['data']=$result;
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
    }
	
}
