<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrgBills extends Model
{
    
   protected $table = 'org_bills';
   protected $primaryKey = 'org_bill_id';

    public $timestamps = true;
    

}
