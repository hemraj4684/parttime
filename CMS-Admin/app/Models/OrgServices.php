<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OrgServices extends Model
{
              protected $table = 'org_services';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'org_ser_id';

    public $timestamps = true;

}
