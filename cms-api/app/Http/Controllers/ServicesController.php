<?php
namespace App\Http\Controllers;
use App\Models\Services;
use input;
use Response;
use DB,Session;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;

class ServicesController extends Controller
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
			 
			
$results = DB::table('services')
->join('users as u1', 'services.created_by', '=', 'u1.id')
->join('users as u2', 'services.updated_by', '=', 'u2.id')
->select('services.*', 'u1.username as createduser','u2.username as updateduser')           
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
    		$subscribe = new Services;
            $subscribe->service_name = $request->input('service_name');
			$subscribe->service_desc = $request->input('service_desc');
			$subscribe->service_logo = $request->input('service_logo');
		    $subscribe->created_by = $request->input('created_by');
            $subscribe->updated_by = $request->input('updated_by');	
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
$results = DB::table('services')
->join('users as u1', 'services.created_by', '=', 'u1.id')
->join('users as u2', 'services.updated_by', '=', 'u2.id')
->select('services.*', 'u1.username as createduser','u2.username as updateduser')           
->where('services.service_id','=',$id)
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
			 $results = Services::where('service_id', $id)
                    ->take(1)
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
        
		try{
			$subscribe = Services::find($id);
            $subscribe->service_name = $request->input('service_name');
			$subscribe->service_desc = $request->input('service_desc');
			$subscribe->service_logo = $request->input('service_logo');
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
