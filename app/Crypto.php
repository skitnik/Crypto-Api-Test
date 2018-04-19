<?php

namespace App;

use App\Api;
use Illuminate\Database\Eloquent\Model;

class Crypto extends Model
{
	public $api;
    public function __construct(){
        $this->api = new Api;
    }

    public function getAll(){
    	$cryptos = $this->api->request('https://api.coinmarketcap.com/v1/ticker/');
    	return $cryptos;
    }

    public function getSingle($id){
    	$crypto = $this->api->request('https://api.coinmarketcap.com/v1/ticker/'. $id);
    	return (array)$crypto[0];
    }

    public function getOneDayPriceHistory($id){
        $dateNow = strtotime(date("Y/m/d H:i:s"));
        $dateBeforeOneMonth = strtotime('-1 day', $dateNow); 

        $priceHistory = $this->api->request('https://graphs2.coinmarketcap.com/currencies/'. $id .'/'. $dateBeforeOneMonth .'000/'. $dateNow .'000/');
        return (array)$priceHistory;
    }

}
