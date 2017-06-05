<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
      protected $table = 'clients';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'client_id';

    public $timestamps = true;
	
	public function subscribeusers()
    {
        return $this->hasMany('App\Models\SubscribeUsers');
    }
}
