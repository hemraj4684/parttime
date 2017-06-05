<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
   protected $table = 'messages';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'message_id';
	 public $timestamps = true;
}
