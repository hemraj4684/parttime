<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillingType extends Model
{

   protected $table = 'billing_types';
   protected $primaryKey = 'bill_type_id';

    public $timestamps = true;
    
	
}
