<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Response;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
		public $rest_result = NULL;
	public static function afterFilter() {
		// Json encode all result and tie it directly to response body so that views cannot be attached to api
        	
		return Response::json(array(
            'status' => 'success',
			'statusCode' => '200',
            'result' => $rest_result),
            200
				);
	 
	}

	
	
}
