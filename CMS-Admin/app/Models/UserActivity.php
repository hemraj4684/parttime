<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserActivity extends Authenticatable
{
	  protected $table = 'user_activity';

   protected $primaryKey = 'user_activity_id';

    public $timestamps = true;

	public function role()
	{
		return $this->belongsTo('App\Models\Role');
	}

	public function organizations()
    {
        return $this->hasMany('App\Models\Organizations');
    }



}
