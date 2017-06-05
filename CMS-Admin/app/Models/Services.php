<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
              protected $table = 'services';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'service_id';

    public $timestamps = true;

}
