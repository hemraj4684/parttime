<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Library\CrudLibrary;
use Auth;

class Tab extends Model
{
    public $columns = [];

    protected $table = 'tabs';

    protected $primaryKey = 'tab_id';

    protected $rules = [
    	'name'  => 'required|min:2|max:255|unique:tabs,name',
    ];
    private $crudLibrary;

    public function __construct()
    {
         $this->crudLibrary = new CrudLibrary($this,$this->table);
    }

    
    public function validateTab(array $data, $id=null)
    {
    	if($id){
    		$this->rules = [
    			'name'  => "required|min:2|max:255|unique:tabs,name,$id,tab_id"
    		];
    	}
    	
    	return  $this->crudLibrary->validateOperation($data,$this->rules);
    }


    public function saveTab(array $data, $id=null)
    {
    	//get all columns of current model

    	$obj = $this->crudLibrary->saveOperation($data);
        
        $obj->created_by = Auth::user()->id;
    	return $obj->save();
    }

    public function updateTab(array $data, $id)
    {
    	//get all columns of current model
    	

        $obj = $this->crudLibrary->updateOperation($data, $id);
    	
        $obj->updated_by = Auth::user()->id;
    	return $obj->save();
    }

}
