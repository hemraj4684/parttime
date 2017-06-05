<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OrgprofUsers extends Model
{
     protected $table = 'org_professional_users';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'org_prof_id';

    public $timestamps = true;

}
