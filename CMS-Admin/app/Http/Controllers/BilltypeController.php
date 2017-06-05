<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Privileges;
use Auth;
use App\Http\Requests;

class BilltypeController extends Controller
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
			 $results = array();
			 $url = env('API_URL')."privileges";
			 $result = $this->httpGet($url);
			 //echo '<pre>';		print_r($result);exit;
			 $results = json_decode($result,false);
			 $privileges = $results->data;
			 return view('privileges.list')->with('privileges',$privileges);	

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
        return view('privileges.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
            $privileges = new Privileges;		
			$privileges->privilege_action = $request->input('privilege_action');
            $privileges->privilege_desc = $request->input('privilege_desc');
			$privileges->created_by = $request->input('created_by');
            $privileges->updated_by = $request->input('updated_by');
            $res = $privileges->save();
			$request->session()->flash('alert-success', 'Privilege successfully Added!');
		return redirect('privileges');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url = env('API_URL')."privileges/show/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
			$privileges = $results->data[0];
			return view('privileges.show')->with('privileges', $privileges);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
   	  		        $url = env('API_URL')."privileges/edit/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
						$privileges = $results->data[0];
			return view('privileges.edit')->with('privileges', $privileges);

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
				
			$privileges = Privileges::find($id);
			$privileges->privilege_action = $request->input('privilege_action');
            $privileges->privilege_desc = $request->input('privilege_desc');
			$privileges->created_by = $request->input('created_by');
            $privileges->updated_by = $request->input('updated_by');
            $res = $privileges->save();
	$request->session()->flash('alert-success', 'Privileges successfully Updated!');
			return redirect('privileges');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $pvroles = Privileges::where('privilege_id', $id);
       	 $pvroles->delete();
    	\Session::flash('alert-danger','Successfully deleted.');
        return redirect('privileges');
    }

	
	

}
