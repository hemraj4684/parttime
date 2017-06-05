<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Orgindtypes extends Model
{
      protected $table = 'org_industry_types';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'org_industry_type_id';

    public $timestamps = true;

}
