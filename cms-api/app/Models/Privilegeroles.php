<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Privilegeroles extends Model
{
     protected $table = 'privilegeroles';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public $timestamps = true;
}