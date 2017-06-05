<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	  protected $table = 'users';



    public $timestamps = true;
	
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function role()
	{
		return $this->belongsTo('App\Models\Role');
	}

	public function subscribeusers()
    {
        return $this->hasMany('App\Models\SubscribeUsers');
    }



}
