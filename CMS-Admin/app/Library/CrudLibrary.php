<?php

namespace App\Library;

use Illuminate\Database\Eloquent\Model;
use Validator,Schema;

class CrudLibrary
{
    private $tableObject,$table;

    public function __construct($tableObject,$table)
    {
        $this->tableObject = $tableObject;
        $this->table       = $table;
        //dd($tableObject,$this->table,$this->rules);
    }

    public function validateOperation(array $data,array $rules)
    {
    	return  Validator::make($data, $rules);
    }
    


    public function saveOperation(array $data)
    {
    	//get all columns of current model
        //dd($table);
    	$columns = Schema::getColumnListing($this->table);

/****** automate save process getting all column names and text box name and save textbox value in columns ******/
    	
    	foreach ($data as $key => $value) {
    		if(in_array($key, $columns)){
    			$this->tableObject->$key = $value;
    		}
    	}

        return $this->tableObject;
        
    }

    public function updateOperation(array $data, $id)
    {
    	//get all columns of current model
    	$columns = Schema::getColumnListing($this->table);
/****** automate save process getting all column names and text box name and save textbox value in columns ******/
    	$obj = $this->tableObject->find($id);
    	//dd($obj,$data,$columns);
    	foreach ($data as $key => $value) {
    		if(in_array($key, $columns)){
    			$obj->$key = $value;
    		}
    	}

        return $obj;
        
    }



}
