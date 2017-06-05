<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OrgSupport extends Model
{
              protected $table = 'org_support_details';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'org_sup_id';

    public $timestamps = true;

}
