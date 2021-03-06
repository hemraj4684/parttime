<?php

/**
  * @author Hemraj Solanki
  */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Route,Session,Schema;

class PermissionController extends Controller
{
    public $per = array();
    private $permModel;
    
    public function __construct(){
        $this->permModel = new Permission();    
    }
    
    public function createPermission()
    {
    	
    	$i = 0;
    	foreach (Route::getRoutes() as $value) {
    		$getName = $value->getName();
    		if($getName){
    			$this->per[$i]['name'] = $getName;
    			$this->per[$i]['routeName'] = $getName;
    			$this->per[$i]['created_at'] = date('Y-m-d H:i:s');
    			$i++;	
    		}
    		
    	}


    	$ins = Permission::insert($this->per);

    	if($ins)
    		Session::flash('success','Record Sync properly');
    	else
    		Session::flash('error','Record Not Sync properly');

    	return view('permission.permissionView');
    }

    public function viewPermission() {
        return view('permission.permissionView');
    }

    public function index()
    {
        return view('permission.permissionView');
    }

    public function show(){

    }



/**
  * sync all named routes and stored in permissions table.
  * if records are already in table then it checks record diff with new array to table record array
  * then seperate new route name and insert. Which routes are not found from table record array delete it.
  *
  * @return proper message.
  */


    public function create()
    {
        $i = 0;
        foreach (Route::getRoutes() as $value) {
            $getName = $value->getName();
            if($getName){
                $this->per[$i]['name'] = $getName;
                $this->per[$i]['routeName'] = $getName;
                $this->per[$i]['created_at'] = date('Y-m-d H:i:s');
                $this->per[$i]['updated_at'] = date('Y-m-d H:i:s');
                $i++;   
            }
            
        }

        /** 
          *@var array $routeNamePresent route name which are in database 
          *@var array $routeNameLatest  route name which are in web.php 
          *@var array $routeNameInsert  diff of route name found from web.php against database for insertion.
          *@var array $routeNameDelete  diff of route name found from database against web.php for deletion.
          */
  


        Schema::disableForeignKeyConstraints();
        Permission::truncate();
        Schema::enableForeignKeyConstraints();
        $ins = Permission::insert($this->per);

        if($ins)
            Session::flash('success','Record Sync properly');
        else
            Session::flash('error','Record Not Sync properly');

        return redirect()->route('permission.index');
    }

    public function edit($id)
    {
        $recId = Permission::find($id);
        //dd($recId);
        return view('permission.permissionEdit',compact('recId'));
    }

    
    public function update(Request $req, $id)
    {
        
        
        $res = $this->permModel->validatePermission($req->all());

        if ($res->fails()) {
            return redirect()->route('permission.edit',$id)
                        ->withErrors($res)
                        ->withInput();
        }
        else{

            $saveYN = $this->permModel->updatePermission($req->all(), $id);
            if($saveYN){

                Session::flash('message','Record Update Successfully');
                return redirect()->route('permission.edit',$id);
            }
            else{

                Session::flash('error','Record not Updated Successfully');
                return redirect()->route('permission.edit',$id); 
            }
            
        }
    }

    public function destroy($id)
    {
        $recId = $this->permModel->findOrFail($id);

        $recId->delete();
                
        if($recId){
            Session::flash('message','Record deleted Successfully');
            return redirect()->route('permission.index');
        }
        else{
            Session::flash('error','Record not deletd Successfully');
            return redirect()->route('permission.index');    
        }
    }
}
