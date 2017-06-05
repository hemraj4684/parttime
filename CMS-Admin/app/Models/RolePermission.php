<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    //roles_permissions
    protected $table = 'roles_permissions';

    public function allPermissionPerRole($roleId){
        $permissionId = [];
        $permissionId = $this->where('role_id',$roleId)->get(['permission_id'])->toArray();
        $permissionId = array_column($permissionId,'permission_id');
        return $permissionId;
    }

    public function allPermissionNamePerRole($roleId){
        $permissionName = [];
        $permissionName = $this->join('permissions','permissions.id','=','roles_permissions.permission_id')->where('role_id',$roleId)->get(['routeName'])->toArray();
        $permissionName = array_column($permissionName,'routeName');
       // dd($permissionName);
        return $permissionName;
    }

}
