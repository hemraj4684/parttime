<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Module;
use Auth,Session;


class ModuleController extends Controller
{
    public function __construct(){
        $this->moduleModel = new Module();    
    }

    public function index()
    {
        $modules = Module::join('tabs','tabs.tab_id','=','modules.tab_id')
                ->select('modules.module_id','modules.name as moduleName','modules.description','tabs.name as tabName')
                ->orderBy('moduleName')
                ->paginate(PAGINATENO);
        return view('modules.moduleList',compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.moduleCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $res = $this->moduleModel->validateModule($req->all());
        //  dd($res->fails());
        if ($res->fails()) {
          return redirect()->route('module.create')
                          ->withErrors($res)
                          ->withInput();
        } else {

          $saveYN = $this->moduleModel->saveModule($req->all());
          if ($saveYN) {
            Session::flash('message', 'Record Saved Successfully');
            return redirect()->route('module.create');
          } else {

            Session::flash('error', 'Record not Saved Successfully');
            return redirect()->route('module.create');
          }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recId = module::findOrFail($id);
    
        return view('modules.moduleEdit', compact('recId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $res = $this->moduleModel->validatemodule($req->all(),$id);

        if ($res->fails()) {
            return redirect()->route('module.edit',$id)
                        ->withErrors($res)
                        ->withInput();
        }
        else{

            $saveYN = $this->moduleModel->updatemodule($req->all(), $id);
            if($saveYN){

                Session::flash('message','Record Update Successfully');
                return redirect()->route('module.edit',$id);
            }
            else{

                Session::flash('error','Record not Updated Successfully');
                return redirect()->route('module.edit',$id); 
            }
            
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
        $recId = Module::findOrFail($id);

    	$recId->delete();
    	    	
    	if($recId){
    		Session::flash('message','Record deleted Successfully');
    		return redirect()->route('module.index');
    	}
    	else{
    		Session::flash('error','Record not deletd Successfully');
    		return redirect()->route('module.index');	
    	}
    }
}
