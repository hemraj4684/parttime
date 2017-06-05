<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
      protected $table = 'contacts';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'contact_id';

    public $timestamps = true;
}
