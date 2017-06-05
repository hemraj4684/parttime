<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    protected $table = 'contracts';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'contract_id';

    public $timestamps = true;
}
