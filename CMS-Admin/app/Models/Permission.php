<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator,Schema,Auth;
use App\Library\CrudLibrary;

class Permission extends Model
{
    protected $fillable = [
        'name', 'routeName', 'module_id'
    ];

    public $columns = [];

    protected $table = 'permissions';

    protected $primaryKey = 'permission_id';

    protected $rules = [
    	'routeName'  => 'required|min:2|max:255|unique:permissions,routeName,$id,permission_id',
    ];

    private $crudLibrary;

    public function __construct()
    {
         $this->crudLibrary = new CrudLibrary($this,$this->table);
         //$permission = new Permission();
    }

    public function getPermissionIdByRouteName($routeName){
        $permissionId = $this->where('routeName',$routeName)->get(['permission_id'])->toArray();
       // dd($permissionId);
        return $permissionId[0]['permission_id'];
    }

    public function allrouteName(){
    	$routeNameData = $routeName = [];


        $org_id = Auth::user()->org_id;
        
        $routeName = $this->join('modules','modules.module_id','=','permissions.module_id')
                        ->join('tabs','tabs.tab_id','=','modules.tab_id')
                        ->join('services','services.service_id','=','tabs.service_id')
                        ->join('org_services','org_services.service_id', '=', 'services.service_id')
                        ->where('org_services.org_id',$org_id)
                        ->where('org_services.status',1)
                        ->whereNull('permissions.deleted_at')
                        ->get(['services.service_name as serviceName','tabs.name as tabName','modules.name as modName','permissions.permission_id','permissions.name as perName','permissions.routeName'])
                        ->groupBy('modName')
                        ->toArray();
                       // dd($routeName)  ;

        $groupByModuleRoutes = array();

            foreach ($routeName as $modkey => $modvalue) {
                foreach ($modvalue as $key => $value) {
                    $groupByModuleRoutes[$modkey][$value['perName']][] = $value;
                }
            }
         // dd($routeName,$groupByModuleRoutes)  ;
        
    	return $groupByModuleRoutes;
    }

    public function validatePermission(array $data,$id=null)
    {
    	if($id){
            $this->rules = [
                'routeName'  => "required|min:2|max:255|unique:permissions,routeName,$id,permission_id"
            ];
        }
        return  $this->crudLibrary->validateOperation($data,$this->rules);
        //Validator::make($data, $this->rules);
    }


    public function savePermission(array $data, $id=null)
    {
    	//get all columns of current model

    	$obj = $this->crudLibrary->saveOperation($data);
        
        $obj->created_by = Auth::user()->id;
    	return $obj->save();
    }

    public function updatePermission(array $data, $id)
    {
    	
        $obj = $this->crudLibrary->updateOperation($data, $id);
    	
        $obj->updated_by = Auth::user()->id;
    	return $obj->save();
    }

}
