<?php

namespace App\Http\Controllers;
use App\Models\Organizations;
use input;
Use DB;
use Response;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;

class OrganizationController extends Controller
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

$org = DB::table('organizations')
->join('users as u1', 'organizations.created_by', '=', 'u1.id')
->join('users as u2', 'organizations.updated_by', '=', 'u2.id')
->select('organizations.*', 'u1.username as createduser','u2.username as updateduser')
->orderby('organizations.status','DESC')
    ->get();
	$results['org']=$org;
$adresults = DB::table('orgnization_addresses')
->join('users as u1', 'orgnization_addresses.created_by', '=', 'u1.id')
->join('users as u2', 'orgnization_addresses.updated_by', '=', 'u2.id')
->select('orgnization_addresses.*', 'u1.username as createduser','u2.username as updateduser')
      ->get();
$results['address']=$adresults;

$orgbills = DB::table('org_bills')
->join('billing_types as b', 'org_bills.bill_type_id', '=', 'b.bill_type_id')
->select('b.*')
 ->get();
$results['billtype']=$orgbills;

$contracts = DB::table('org_contracts')
->join('services as s', 'org_contracts.service_id', '=', 's.service_id')
->select('s.service_name','org_contracts.*')
 ->get();
$results['contract']=$contracts;


$profuser = DB::table('org_support_details')
->join('users as u1', 'org_support_details.user_id', '=', 'u1.id')
->select('org_support_details.*','u1.username as professional_user','u1.email','u1.phone_number')
 ->get();
$results['profuser']=$profuser;

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
$results['org'] = DB::table('organizations')
->join('users as u1', 'organizations.created_by', '=', 'u1.id')
->join('users as u2', 'organizations.updated_by', '=', 'u2.id')
->select('organizations.*', 'u1.username as createduser','u2.username as updateduser')
   ->where('organizations.org_id','=',$id)    ->get();
              
$adresults = DB::table('orgnization_addresses')
->join('users as u1', 'orgnization_addresses.created_by', '=', 'u1.id')
->join('users as u2', 'orgnization_addresses.updated_by', '=', 'u2.id')
->select('orgnization_addresses.*', 'u1.username as createduser','u2.username as updateduser')
               ->where('orgnization_addresses.org_id','=',$id)    ->get();
$results['address']=$adresults;

$orgserves = DB::table('org_services')
->join('services as s', 'org_services.service_id', '=', 's.service_id')
->select('s.service_name')
->where('org_services.org_id','=',$id)    ->get();
$results['services']=$orgserves;


$orgbills = DB::table('org_bills')
->join('billing_types as b', 'org_bills.bill_type_id', '=', 'b.bill_type_id')
->select('b.*')
->where('org_bills.org_id','=',$id)    ->get();
$results['billtype']=$orgbills;

$contracts = DB::table('contracts')
->join('services as s', 'contracts.service_id', '=', 's.service_id')
->select('s.service_name','contracts.*')
->where('contracts.org_id','=',$id)    ->get();
$results['contract']=$contracts;


$profuser = DB::table('org_support_details')
->join('users as u1', 'org_support_details.user_id', '=', 'u1.id')
->select('u1.username as professional_user','u1.email','u1.phone_number')
->where('org_support_details.org_id','=',$id)    ->get();
$results['profuser']=$profuser;




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
$results['org'] = DB::table('organizations')
->join('users as u1', 'organizations.created_by', '=', 'u1.id')
->join('users as u2', 'organizations.updated_by', '=', 'u2.id')
->select('organizations.*', 'u1.username as createduser','u2.username as updateduser')
   ->where('organizations.org_id','=',$id)    ->get();
              
$adresults = DB::table('orgnization_addresses')
->join('users as u1', 'orgnization_addresses.created_by', '=', 'u1.id')
->join('users as u2', 'orgnization_addresses.updated_by', '=', 'u2.id')
->select('orgnization_addresses.*', 'u1.username as createduser','u2.username as updateduser')
               ->where('orgnization_addresses.org_id','=',$id)    ->get();
$results['address']=$adresults;
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
