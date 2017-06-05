<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class triggers extends Model
{
   protected $table = 'triggers';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'trigger_id';
	 public $timestamps = true;
}
