<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\RolePermission;
use Schema,Session;

class RolePermissionController extends Controller
{
    public $rolePer = array();
    private $permModel;
    private $perm;
    
    public function __construct(){
        $this->permModel = new RolePermission();
        $this->perm = new Permission();    
    }

    public function index()
    {
    	$routeName = $this->perm->allrouteName();
    	//dd($routeName);
    	return view('permission.rolePermission', compact('routeName'));
    }

    public function getPermissionsAsPerRole($id){
    	//$routeName = $this->permModel->allrouteName();

        $routeName = $this->perm->allrouteName();
        $permissionPerRole = $this->permModel->allPermissionPerRole($id);
        return view('permission.rolePermissionAjax', compact('routeName','permissionPerRole'));   
    }

    public function store(Request $req){
        $dataIns = $dataDel = false;
    	$permissionPerRole = $permissionPerRoleInsert = $permissionPerRoleDelete = array();

    	$permissionPerRole = $this->permModel->allPermissionPerRole($req->role_id);
        
        $permissionPerRoleInsert = array_diff($req->permission_id,$permissionPerRole);
        $permissionPerRoleDelete = array_diff($permissionPerRole, $req->permission_id);
    
        //dd($permissionPerRole, $permissionPerRoleInsert, $permissionPerRoleDelete, $req->permission_id)        ;
        if(!empty($permissionPerRoleDelete)){
           // Schema::disableForeignKeyConstraints();
            $dataDel = RolePermission::whereIn('permission_id',$permissionPerRoleDelete)->delete();
           // Schema::enableForeignKeyConstraints();
        }

        if(!empty($permissionPerRoleInsert)){

            $i=0;
            foreach ($permissionPerRoleInsert as $perId) {
                $this->rolePer[$i]['role_id'] = $req->role_id;
                $this->rolePer[$i]['permission_id'] = $perId;
                $i++;
            }

            $dataIns = RolePermission::insert($this->rolePer);    
        }

        if($dataIns || $dataDel)
    		Session::flash('success','Record save properly');
    	else
    		Session::flash('error','Record Not save properly');

        if(empty($permissionPerRoleDelete) && empty($permissionPerRoleInsert))
            Session::flash('error','No change detected');


    	return redirect()->route('role.permission.view');
    	
    }
}
