<?php


namespace App\Http\Controllers;
use App\Models\Contacts;
use App\Models\Client;
use input;
use Response;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        try{
			 $response['status'] ='200';
             $statusCode = 200;
			 $results = Contacts::where('client_id', $id)
			 			->get();
						$i=0;
					foreach($results as $result)
					{
						 $res = Client::where('client_id', $result->client_id)
                    	->take(1)
                    	->get();
						 $results[$i]['orgname'] = $res[0]['orgname'];	
					  $i++;
					}
//dd($results);
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
			 $response['status'] ='200';
            $statusCode = 200;
			 $results = Contacts::where('contact_id', $id)
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
			 $results = Contacts::where('contact_id', $id)
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