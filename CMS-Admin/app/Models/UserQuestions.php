<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuestions extends Model
{
    // table name
	protected $table = 'user_opt_security_question'; 
	
	/**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'user_question_id';

    public $timestamps = true;
}

