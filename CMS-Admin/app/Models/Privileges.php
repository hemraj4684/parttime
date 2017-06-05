<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Privileges extends Model
{
     protected $table = 'privileges';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'privilege_id';

    public $timestamps = true;
}