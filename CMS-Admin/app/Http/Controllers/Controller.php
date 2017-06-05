<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
	
	  
  
    /* api request to api server  using curl
    *   return json response
    */
    public function httpPost($params, $url, $method="PUT") {                                   
		//print_r($params);                                 
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json', 
        'Content-Length: ' . strlen($params))
			);
		 $result = curl_exec($ch);
		return $result;	//return $result;
    }
	public function httpGet($url)
	{
		$ch = curl_init();  
	    curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	//  curl_setopt($ch,CURLOPT_HEADER, false);  
		$output=curl_exec($ch);
	    curl_close($ch);
		return $output;
	}
	
	// orm result to json
	public static function as_object_array($result) {
		$output = array();
        foreach ($result as $r) {
            $output[] = $r->as_array();
        }
         return $output;
    }


}
