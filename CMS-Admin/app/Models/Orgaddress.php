<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orgaddress extends Model
{
          protected $table = 'orgnization_addresses';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'org_address_id';

    public $timestamps = true;

}
