<?php

namespace App\Http\Controllers;
use App\Models\Subscribe;
use input;
use Response;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;

class SubscribeController extends Controller
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
			 
			 $results = Subscribe::all()
			 
			
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
    		$subscribe = new Subscribe;
            $subscribe->title = $request->input('title');
			$subscribe->description = $request->input('description');
			$subscribe->subscribe_type = $request->input('subscribe_type');
			$subscribe->subscribe_price = $request->input('subscribe_price');
			$subscribe->status = '1';            
            $subscribe->user_created = $request->input('user_created');
            $subscribe->user_updated = $request->input('user_updated');	
            $subscribe->save();
			
			$request->session()->flash('alert-success', 'Subscribe was successfully added!');
			return redirect('subscribes');
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
			 $results = Subscribe::where('subscribe_id', $id)
                    ->take(1)
                    ->get();
			$response['subscribes'] = $results;
            
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
			 $results = Subscribe::where('subscribe_id', $id)
                    ->take(1)
                    ->get();
			$response['subscribes'] = $results;
            
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
        
			$subscribe = Subscribe::find($id);
            $subscribe->title = $request->input('title');
			$subscribe->description = $request->input('description');
			$subscribe->subscribe_type = $request->input('subscribe_type');
			$subscribe->subscribe_price = $request->input('subscribe_price');
			$subscribe->status = '1';            
            $subscribe->user_created = $request->input('user_created');
            $subscribe->user_updated = $request->input('user_updated');	
            $subscribe->save();
			$request->session()->flash('alert-success', 'Subscribe was successfully Updated!');
			return redirect('subscribes');
    
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
