<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
      protected $table = 'org_contacts';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'org_con_id';

    public $timestamps = true;
}
