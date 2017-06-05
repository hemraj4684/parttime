<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissionroles extends Model
{
     protected $table = 'permissionroles';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public $timestamps = true;
}