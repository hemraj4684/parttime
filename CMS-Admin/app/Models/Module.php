<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Library\CrudLibrary;
use Auth;

class Module extends Model
{
    public $columns = [];

    protected $table = 'modules';

    protected $primaryKey = 'module_id';

    protected $rules = [
    	'name'  => 'required|min:2|max:255|unique:modules,name',
    ];
    private $crudLibrary;

    public function __construct()
    {
         $this->crudLibrary = new CrudLibrary($this,$this->table,$this->rules);
    }

    
    public function validateModule(array $data, $id=null)
    {
    	if($id){
    		$this->rules = [
    			'name'  => "required|min:2|max:255|unique:modules,name,$id,module_id"
    		];
    	}
    	
    	return  $this->crudLibrary->validateOperation($data,$this->rules);
    }


    public function saveModule(array $data, $id=null)
    {
    	//get all columns of current model

    	$obj = $this->crudLibrary->saveOperation($data);
        
        $obj->created_by = Auth::user()->id;
    	return $obj->save();
    }

    public function updateModule(array $data, $id)
    {
    	//get all columns of current model
    	

        $obj = $this->crudLibrary->updateOperation($data, $id);
    	
        $obj->updated_by = Auth::user()->id;
    	return $obj->save();
    }

}