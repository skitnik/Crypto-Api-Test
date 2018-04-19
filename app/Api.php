<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Api extends Model
{	

    public function request($url){
      
  	// $ch = curl_init();
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		// curl_setopt($ch, CURLOPT_HEADER, FALSE);
  	// curl_setopt($ch, CURLOPT_URL, 'http://example.com/path/to/api/call?param1=5');
  	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// $response = curl_exec($ch);
		// curl_close($ch);
    // return $response;
    	
		return json_decode(file_get_contents($url));
		
    }
}
