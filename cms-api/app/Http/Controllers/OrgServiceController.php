<?php

namespace App\Http\Controllers;
use App\Models\OrgServices;
use input;
use Response;
use DB,Session;
use Illuminate\Http\Request;
use App\Http\Requests;


class OrgServiceController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			 try{
			 $response['status'] ='200';
             $statusCode = 200;
			 
			
$results = DB::table('org_services')
->join('users as u1', 'org_services.created_by', '=', 'u1.id')
->join('users as u2', 'org_services.updated_by', '=', 'u2.id')
->join('organizations as org', 'org_services.org_id', '=', 'org.org_id')
->join('services as ser', 'org_services.service_id', '=', 'ser.service_id')
->select('org_services.*','org.org_name','ser.service_name', 'u1.username as createduser','u2.username as updateduser')           
->orderby('org_services.status','DESC')
            ->get();
			 
			
			 $response['data'] = $results;
				//dd($results);
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

//dd($request->input());
		try{
    		$subscribe = new OrgServices;
            $subscribe->org_id = $request->input('org_id');
			$subscribe->service_id = $request->input('service_id');
		    $subscribe->created_by = $request->input('created_by');
            $subscribe->updated_by = $request->input('updated_by');	
			$subscribe->status = '1';	
            $mesdb = $subscribe->save();
			if($mesdb)
			{
	        return Response::json(array(
            'error' => false,
			'status' => 200,
            'message' => 'Service Saved'),
            200
        		);
			}else{
				    
					return Response::json(array(
            'error' => true,
			'status' => 400,           
		    'message' => 'Error in saving data.'),
            400
        		);
				}
				}catch(Exception $e){
			echo $e->getMessage();
			//exit;
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
	 try{
			 $response['status'] ='200';
            $statusCode = 200;
$results = DB::table('org_services')
->join('users as u1', 'org_services.created_by', '=', 'u1.id')
->join('users as u2', 'org_services.updated_by', '=', 'u2.id')
->join('organizations as org', 'org_services.org_id', '=', 'org.org_id')
->join('services as ser', 'org_services.updated_by', '=', 'ser.service_id')
->select('org_services.*','org.org_name','ser.service_name', 'u1.username as createduser','u2.username as updateduser')           
->where('org_services.org_ser_id', '=', $id)
            ->get();

			$response['data'] = $results;
            
        }catch (Exception $e){
            $statusCode = 400;
			$response['status'] ='400';
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
			 $response['status'] ='200';
            $statusCode = 200;
$results = DB::table('org_services')
->join('users as u1', 'org_services.created_by', '=', 'u1.id')
->join('users as u2', 'org_services.updated_by', '=', 'u2.id')
->join('organizations as org', 'org_services.org_id', '=', 'org.org_id')
->join('services as ser', 'org_services.updated_by', '=', 'ser.service_id')
->select('org_services.*','org.org_name','ser.service_name', 'u1.username as createduser','u2.username as updateduser')           
->where('org_services.org_ser_id', '=', $id)
            ->get();
			$response['data'] = $results;
            
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
//dd($request->input());        
		try{
			$subscribe = OrgServices::find($id);
			$subscribe->org_id = $request->input('org_id');
			$subscribe->service_id = $request->input('service_id');
		    $subscribe->created_by = $request->input('created_by');
            $subscribe->updated_by = $request->input('updated_by');	
			$subscribe->status = $request->input('status');	
            $mesdb = $subscribe->save();
			if($mesdb)
			{
	        return Response::json(array(
            'error' => false,
			'status' => 200,
            'message' => 'Service Updated'),
            200
        		);
			}else{
				    
					return Response::json(array(
            'error' => true,
			'status' => 400,           
		    'message' => 'Error in saving data.'),
            400
        		);
				}

		}catch(Exception $e){
			echo $e->getMessage();
			//exit;
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
        //
    }
		
}
