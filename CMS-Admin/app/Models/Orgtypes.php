<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orgtypes extends Model
{

      protected $table = 'organization_types';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'org_type_id';

    public $timestamps = true;
	

}
