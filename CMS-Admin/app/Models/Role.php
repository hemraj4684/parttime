<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
      protected $table = 'roles';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'role_id';

    public $timestamps = true;
	
	public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
