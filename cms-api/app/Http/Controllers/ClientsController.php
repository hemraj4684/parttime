<?php

namespace App\Http\Controllers;
use App\Models\Client;
use input;
use Response;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
         try{
			
			 $response = [ 'status'  => '200','clients' => []];
            $statusCode = 200;
			 $clients = Client::where('parent_id', $id)
			 			->get();
			 $response['clients'] = $clients;

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
        try{
			
		//echo '<pre>';
		//print_r($request->input());exit;
		    $clients = new Client;		
		    $clients->orgname = $request->input('orgname');
            $clients->address = $request->input('address');
			$clients->city = $request->input('city');
			$clients->state = $request->input('state');
			$clients->country = $request->input('country');
			$clients->landline = $request->input('landline');
			$clients->logo = $request->input('logo');
			$clients->timezone = $request->input('timezone');
			$clients->url = $request->input('url');
			$clients->facebook_id = $request->input('facebook_id');
			$clients->twitter_id = $request->input('twitter_id');
            $clients->parent_id = $request->input('userparent');
			$clients->user_created = $request->input('user_created');
            $clients->user_updated = $request->input('user_updated');
			$clients->active = $request->input('active');;
			$clients->status = '1';			
            $resdb = $clients->save();
			if($resdb)
			{
	        return Response::json(array(
            'error' => false,
			'status' => 200,
            'message' => 'Client was successfully Added!'),
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
			
			
		}catch(Exception $e)
		{
			return Response::json(array(
            'error' => true,
			'status' => 400,           
		    'message' => 'Error in saving data.'),
            400
        		);
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
			 $response = ['status'  => '200','clients' => []];
            $statusCode = 200;
			 $clients = Client::where('client_id', $id)
                    ->take(1)
                    ->get();
				$response['clients'] = $clients;
            
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
			 $response = ['status'  => '200','clients' => []      ];
            $statusCode = 200;
			 $clients = Client::where('client_id', $id)
                    ->take(1)
                    ->get();
				$response['clients'] = $clients;
            
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
           try{
			
			//		echo '<pre>';
		//print_r($request->input());exit;
			    $clients = Client::find($id);
            $clients->orgname = $request->input('orgname');
            $clients->address = $request->input('address');
			$clients->city = $request->input('city');
			$clients->state = $request->input('state');
			$clients->country = $request->input('country');
			$clients->landline = $request->input('landline');
			$clients->logo = $request->input('logo');
			$clients->timezone = $request->input('timezone');
			$clients->url = $request->input('url');
			$clients->facebook_id = $request->input('facebook_id');
			$clients->twitter_id = $request->input('twitter_id');
            $clients->user_updated = $request->input('user_updated');
			$clients->active = $request->input('active');
					
	        $resdb = $clients->save();
			if($resdb)
			{
	        return Response::json(array(
            'error' => false,
			'status' => 200,
            'message' => 'Client was successfully Added!'),
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
			
			
		}catch(Exception $e)
		{
			
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
