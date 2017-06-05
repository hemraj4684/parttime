<?php

namespace App\Http\Controllers;
use App\Models\Messages;
use input;
use DB;
use Response;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;

class MessageController extends Controller
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
			 
			// $results = Messages::where('parent_id', $id)
			 //			->get();
						
$results = DB::table('messages')
->join('triggers', 'messages.trigger_id', '=', 'triggers.trigger_id')
->select('messages.*', 'triggers.title as triggertitle')           
->where('messages.parent_id', '=', $id)
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
       		$message = new Messages;
            $message->title = $request->input('title');
			$message->status = '1';
			$message->parent_id = $request->input('userparent');			
			$message->trigger_id = $request->input('trigger_id');			
            $message->content = $request->input('content');
			$message->description = $request->input('description');
			$message->message_time = $request->input('message_time');
            $message->user_created = $request->input('user_created');
            $message->user_updated = $request->input('user_updated');	
            $mesdb = $message->save();
			if($mesdb)
			{
	        return Response::json(array(
            'error' => false,
			'status' => 200,
            'message' => 'Message Saved'),
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
			/* $results = Messages::where('message_id', $id)
                    ->take(1)
                    ->get();*/
					$results = DB::table('messages')
->join('triggers', 'messages.trigger_id', '=', 'triggers.trigger_id')
->join('triggers', 'messages.trigger_id', '=', 'triggers.trigger_id')
->join('triggers', 'messages.trigger_id', '=', 'triggers.trigger_id')
->select('messages.*', 'triggers.title as triggertitle')           
->where('messages.message_id', '=', $id)
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
			 $results = Messages::where('message_id', $id)
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
        	$message = Messages::find($id);
            $message->title = $request->input('title');
			$message->status = '1';
            $message->content = $request->input('content');
			$message->trigger_id = $request->input('trigger_id');
			$message->description = $request->input('description');
			$message->message_time = $request->input('message_time');
            $message->user_updated = $request->input('user_updated');	
            $mesdb = $message->save();
			if($mesdb)
			{
	        return Response::json(array(
            'error' => false,
			'status' => 200,
            'message' => 'Message was successfully Updated!'),
            200
        		);
			}else{
				    
					return Response::json(array(
            'error' => true,
			'status' => 400,
            'message' => 'Error in Updating data.'),
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
