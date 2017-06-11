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
        $roleId = Auth::user()->role_id;//Session::get('roleId');
        $org_id = Auth::user()->org_id;
        $permissionName = $this->permModel->allPermissionNamePerRole($roleId,$org_id);
        //dd($curRoute,$permissionName);
        if(in_array($curRoute, $permissionName)){
            return $next($request);
        }
        else {
            return redirect('/userNotFound');
        }
    }
}
