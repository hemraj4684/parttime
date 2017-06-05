<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    // table name
	protected $table = 'weatherpatterns'; 
	
	/**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'wp_id';

    public $timestamps = true;
}

