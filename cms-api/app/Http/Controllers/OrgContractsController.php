<?php
namespace App\Http\Controllers;
use App\Models\Organizations;
use App\Models\Contracts;
use App\Models\OrgContracts;
use input;
Use DB;
use Response;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;

class OrgContractsController extends Controller
{
    public function index()
    {

         try{
			 $response['status'] = '200';
             $statusCode = 200;

$results = DB::table('org_contracts')
->join('users as u1', 'org_contracts.created_by', '=', 'u1.id')
->join('users as u2', 'org_contracts.updated_by', '=', 'u2.id')
->join('organizations as org', 'org_contracts.org_id', '=', 'org.org_id')
->join('services as ser', 'org_contracts.service_id', '=', 'ser.service_id')
->select('org_contracts.*','org.org_name','ser.service_name', 'u1.username as createduser','u2.username as updateduser')
->orderby('org_contracts.status','DESC')
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
  		 try{
			 $response['status'] = '200';
            $statusCode = 200;
$results = DB::table('org_contracts')
->join('users as u1', 'org_contracts.created_by', '=', 'u1.id')
->join('users as u2', 'org_contracts.updated_by', '=', 'u2.id')
->join('organizations as org', 'org_contracts.org_id', '=', 'org.org_id')
->join('services as ser', 'org_contracts.service_id', '=', 'ser.service_id')
->select('org_contracts.*','org.org_name','ser.service_name', 'u1.username as createduser','u2.username as updateduser')
->where('org_contracts.org_con_id','=',$id) 
->get();
                $response['data']=$results;
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
			 $response['status'] = '200';
            $statusCode = 200;

$results = DB::table('org_contracts')
->join('users as u1', 'org_contracts.created_by', '=', 'u1.id')
->join('users as u2', 'org_contracts.updated_by', '=', 'u2.id')
->join('organizations as org', 'org_contracts.org_id', '=', 'org.org_id')
->join('services as ser', 'org_contracts.service_id', '=', 'ser.service_id')
->select('org_contracts.*','org.org_name','ser.service_name', 'u1.username as createduser','u2.username as updateduser')
->where('org_contracts.org_con_id','=',$id) 
->get();

                $response['data']=$results;
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
    public function delete($id)
    {
	 $role = Contracts::find($id);

        $role->delete();

        return Response::json(array(
            'error' => false,
            'message' => 'Contract Deleted'),
            200
        );
    }
	

}
