<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organizations extends Model
{
      protected $table = 'organizations';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'org_id';

    public $timestamps = true;
	
}
