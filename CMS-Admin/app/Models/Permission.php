<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator,Schema;

class Permission extends Model
{
    protected $fillable = [
        'name', 'routeName'
    ];

    public $columns = [];

    protected $table = 'permission';

    protected $rules = [
    	'routeName'  => 'required|min:2|max:255',
    ];

    public function allrouteName(){
    	$routeNameData = $routeName = [];

    	$routeName = $this->get(['id','name']);
    	// foreach ($routeName as $value) {
    	// 	$routeNameData[] = $value->name;
    	// }
    	return $routeName;
    }

    public function validatePermission(array $data)
    {
    	
    	return  Validator::make($data, $this->rules);
    	
    }


    public function savePermission(array $data, $id=null)
    {
    	//get all columns of current model

    	$columns = Schema::getColumnListing($this->table);

/****** automate save process getting all column names and text box name and save textbox value in columns ******/
    	
    	foreach ($data as $key => $value) {
    		if(in_array($key, $columns)){
    			$this->$key = $value;
    		}
    	}
        #TODO ADD PROPER USER ID
        $this->created_by = 1;
    	return $this->save();
    }

    public function updatePermission(array $data, $id)
    {
    	//get all columns of current model

    	$columns = Schema::getColumnListing($this->table);

/****** automate save process getting all column names and text box name and save textbox value in columns ******/
    	$obj = $this->find($id);
    	//dd($obj,$data,$columns);
    	foreach ($data as $key => $value) {
    		if(in_array($key, $columns)){
    			$obj->$key = $value;
    		}
    	}
        #TODO ADD PROPER USER ID
        $obj->updated_by = 1;
    	return $obj->save();
    }

}
