<?php
namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Auth;use DB;
use Illuminate\Http\Request;
use App\Models\SubscribeUsers;
use App\Http\Requests;


class SubscribeUsersController extends Controller
{
    /**
     * 	Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');		
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		try{
		  $subscribes = SubscribeUsers::all();
		  
		  return view('subscribeusers.list')->with('subscribes',$subscribes);  
		}catch(Exception $e){
			echo $e->getMessage();
			
		}

		

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		 $subplans = \DB::table('subscrptions')->lists('title', 'subscribe_id');
		 $clients = \DB::table('clients')->lists('orgname', 'client_id');
    return view('subscribeusers.create')->with('subplans', $subplans)->with('clients', $clients);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
				
			if(Auth::user()->role_id == '3')
			{
				 $parent_id = Auth::user()->id;			
			}else{
				 $parent_id = Auth::user()->parent_id;			
			}
        
		    $subscribe = new SubscribeUsers;
            $subscribe->user_id = $request->input('user_id');
			$subscribe->subscribe_id = $request->input('subscribe_id');
		    $subscribe->user_created = $request->input('user_created');
            $subscribe->user_updated = $request->input('user_updated');	
            $subscribe->save();
			
			$request->session()->flash('alert-success', 'Subscribe was successfully added!');
			return redirect('subscribeusers');
    }

    /**
     * Display the specified resource.
     *
`     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $subscribes = SubscribeUsers::find($id); 

       return view('subscribeusers.show')->with('subscribes', $subscribes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $subscribes = SubscribeUsers::find($id); 
		 $subplans = \DB::table('subscrptions')->lists('title', 'subscribe_id');
		 $clients = \DB::table('clients')->lists('orgname', 'client_id');			

         return view('subscribeusers.edit')->with('subscribes',$subscribes)->with('subplans', $subplans)->with('clients', $clients);
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
        	
            if(Auth::user()->role_id == '3')
			{
				 $parent_id = Auth::user()->id;			
			}else{
				 $parent_id = Auth::user()->parent_id;			
			}
        
		  
			$subscribe = SubscribeUsers::find($id);
            $subscribe->user_id = $request->input('user_id');
			$subscribe->subscribe_id = $request->input('subscribe_id');
		    $subscribe->user_created = $request->input('user_created');
            $subscribe->user_updated = $request->input('user_updated');	
            $subscribe->save();
					$request->session()->flash('alert-success', 'Subscribe was successfully Updated!');
			return redirect('subscribeusers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscribes = SubscribeUsers::find($id);
		$subscribes->delete();
		\Session::flash('alert-danger','Successfully deleted.');

		return redirect('subscribeusers');
    }
}
