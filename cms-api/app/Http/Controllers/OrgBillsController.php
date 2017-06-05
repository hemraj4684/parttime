<?php

namespace App\Http\Controllers;
use App\Models\BillingType;
use App\Models\OrgBills;
use App\Models\Organizations;
use input;
use Response;
use DB,Session;
use Illuminate\Http\Request;
use App\Http\Requests;

class OrgBillsController extends Controller
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
			 
			
$results = DB::table('org_bills')
->join('users as u1', 'org_bills.created_by', '=', 'u1.id')
->join('users as u2', 'org_bills.updated_by', '=', 'u2.id')
->join('organizations as org', 'org_bills.org_id', '=', 'org.org_id')
->join('billing_types as bt', 'org_bills.bill_type_id', '=', 'bt.bill_type_id')
->select('org_bills.*','org.org_name','bt.bill_type', 'u1.username as createduser','u2.username as updateduser')           
->orderby('org_bills.status','DESC')
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
    		$subscribe = new OrgBills;
            $subscribe->org_id = $request->input('org_id');
			$subscribe->bill_type_id = $request->input('bill_type_id');
		    $subscribe->created_by = $request->input('created_by');
            $subscribe->updated_by = $request->input('updated_by');	
            $mesdb = $subscribe->save();
			if($mesdb)
			{
	        return Response::json(array(
            'error' => false,
			'status' => 200,
            'message' => 'Bill data Saved'),
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
$results = DB::table('org_bills')
->join('users as u1', 'org_bills.created_by', '=', 'u1.id')
->join('users as u2', 'org_bills.updated_by', '=', 'u2.id')
->join('organizations as org', 'org_bills.org_id', '=', 'org.org_id')
->join('billing_types as bt', 'org_bills.bill_type_id', '=', 'bt.bill_type_id')
->select('org_bills.*','org.org_name','bt.bill_type', 'u1.username as createduser','u2.username as updateduser')                 
->where('org_bills.org_bill_id', '=', $id)
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
$results = DB::table('org_bills')
->join('users as u1', 'org_bills.created_by', '=', 'u1.id')
->join('users as u2', 'org_bills.updated_by', '=', 'u2.id')
->join('organizations as org', 'org_bills.org_id', '=', 'org.org_id')
->join('billing_types as bt', 'org_bills.bill_type_id', '=', 'bt.bill_type_id')
->select('org_bills.*','org.org_name','bt.bill_type', 'u1.username as createduser','u2.username as updateduser')                 
->where('org_bills.org_bill_id', '=', $id)
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
			$subscribe->bill_type_id = $request->input('bill_type_id');	
			$subscribe->created_by = $request->input('created_by');
            $subscribe->updated_by = $request->input('updated_by');	
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
