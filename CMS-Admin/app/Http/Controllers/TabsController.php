<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Tab;
use Auth,Session;

class TabsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $tab = array();
    private $tabModel;

    
    public function __construct(){
        $this->tabModel = new Tab();    
    }

    public function index()
    {
        $tabs = Tab::join('services','services.service_id','=','tabs.service_id')
                ->select('tabs.tab_id','tabs.name','tabs.description','services.service_name')->paginate(PAGINATENO);
        return view('tabs.tabList',compact('tabs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tabs.tabCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $res = $this->tabModel->validateTab($req->all());
        //  dd($res->fails());
        if ($res->fails()) {
          return redirect()->route('tab.create')
                          ->withErrors($res)
                          ->withInput();
        } else {

          $saveYN = $this->tabModel->saveTab($req->all());
          if ($saveYN) {
            Session::flash('message', 'Record Saved Successfully');
            return redirect()->route('tab.create');
          } else {

            Session::flash('error', 'Record not Saved Successfully');
            return redirect()->route('tab.create');
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
        $recId = Tab::findOrFail($id);
    
        return view('tabs.tabEdit', compact('recId'));
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
        $res = $this->tabModel->validateTab($req->all(),$id);

        if ($res->fails()) {
            return redirect()->route('tab.edit',$id)
                        ->withErrors($res)
                        ->withInput();
        }
        else{

            $saveYN = $this->tabModel->updateTab($req->all(), $id);
            if($saveYN){

                Session::flash('message','Record Update Successfully');
                return redirect()->route('tab.edit',$id);
            }
            else{

                Session::flash('error','Record not Updated Successfully');
                return redirect()->route('tab.edit',$id); 
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
        $recId = Tab::findOrFail($id);

        $recId->delete();
                
        if($recId){
            Session::flash('message','Record deleted Successfully');
            return redirect()->route('tab.index');
        }
        else{
            Session::flash('error','Record not deletd Successfully');
            return redirect()->route('tab.index'); 
        }
    }
}
