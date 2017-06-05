<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
     protected $table = 'locations';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'location_id';

    public $timestamps = true;

}
