<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    //roles_permissions
    protected $table = 'roles_permissions';

    public function allPermissionPerRole($roleId,$orgId)
    {
        $permissionId = [];
        $permissionId = $this->where('role_id',$roleId)->where('org_id',$orgId)->get(['permission_id'])->toArray();
        $permissionId = array_column($permissionId,'permission_id');
        return $permissionId;
    }

    public function allPermissionNamePerRole($roleId,$orgId)
    {
      $permissionName = [];
      $permissionName = $this->join('permissions','permissions.permission_id','=','roles_permissions.permission_id')
                                ->join('modules','modules.module_id','=','permissions.module_id')
                                ->join('tabs','tabs.tab_id','=','modules.tab_id')
                                ->join('services','services.service_id','=','tabs.service_id')
                                ->join('org_services','org_services.service_id', '=', 'services.service_id')
                                ->where('org_services.org_id',$orgId)
                                ->where('org_services.status',1)
                                ->where('roles_permissions.role_id',$roleId)
                                ->where('roles_permissions.org_id',$orgId)
                                ->get(['permissions.name as perName','permissions.routeName'])
                                ->toArray();

       
      $permissionName = array_column($permissionName,'routeName');
      //  dd($permissionName);
      return $permissionName;
    }

}
