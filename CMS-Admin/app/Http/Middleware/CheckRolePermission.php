<?php

namespace App\Http\Middleware;
use App\Models\Permission;
use App\Models\RolePermission;
use Auth;
use Closure,Session;

class CheckRolePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public $rolePer = array();
    private $permModel;
    private $perm;

    public function __construct(){
        $this->permModel = new RolePermission();
        $this->perm = new Permission();
    }
    public function handle($request, Closure $next)
    {
        $curRoute = $request->route()->getName();
        $permissionId = $this->perm->getPermissionIdByRouteName($curRoute);
        if($permissionId){
            $roleId = Auth::user()->role_id;//Session::get('roleId');
            $org_id = Auth::user()->org_id;
            $permissionIdPerRole = $this->permModel->allPermissionPerRole($roleId,$org_id);
            //dd($permissionId,$permissionIdPerRole);
            if(in_array($permissionId, $permissionIdPerRole)){
              //  dd($curRoute);
                return $next($request);
            }
            else {
                return redirect('/notauthorized');
            }    
        }
        else 
        {
            return redirect('/notauthorized');
        }
        
    }
}
