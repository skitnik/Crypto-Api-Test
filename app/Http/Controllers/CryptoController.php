<?php

namespace App\Http\Controllers;

use App\Crypto;
use Illuminate\Http\Request;

class CryptoController extends Controller
{
    public function listAll(){
    	$currencies = [];
        $crypto = new Crypto;     
        $cryptos = $crypto->getAll();

        foreach($cryptos as $key=>$value){
            $currencies[$key] = $value;
        }

        return view('index')->with('currencies', $currencies);
    }

    public function listSingle(Request $request){
    	$crypto = new Crypto;     
        $id = $request->route('id');
        
        $currency = [];
        $currnecySymbol = $crypto->getSingle($id)['symbol']; 
        foreach ($crypto->getSingle($id) as $key => $value) { 
            if($key == 'price_usd'){
                $currency[] = ['Usd price', '$'.$value];
            }elseif($key == 'price_btc'){
                $currency[] = ['BTC price', $value .' BTC'];
            }elseif($key == '24h_volume_usd'){
                $currency[] = ['Volume (24h)', '$'. (int)$value];
            }elseif($key == 'available_supply'){
                $currency[] = ['Available supply', (int)$value .' '. $currnecySymbol];
            }elseif($key == 'total_supply'){
                $currency[] = ['Total supply', (int)$value .' '. $currnecySymbol];
            }elseif($key == 'market_cap_usd'){
                $currency[] = ['Usd Market Cap', '$'.(int)$value];
            }elseif($key == 'percent_change_1h'){
                $currency[] = ['Change percent (1h)', $value .'%'];
            }elseif($key == 'percent_change_24h'){
                $currency[] = ['Change percent (24h)', (int)$value .'%'];
            }elseif($key == 'percent_change_7d'){
                $currency[] = ['Change percent (7d)', (int)$value .'%'];
            }elseif($key == 'last_updated'){
                $currency[] = ['Last update at',  date('d/m/Y H:i', $value)];
            }elseif($key == 'max_supply'){
            }else{
                $currency[] = [$key,$value];    
            }             
        }

        $priceHistory = $crypto->getOneDayPriceHistory($id);
        $priceUsdHistory = $priceHistory['price_usd'];
        $priceHistoryFormated = []; 
        foreach($priceUsdHistory as $period){
            $priceHistoryFormated[] = [
                'time'  => date('d/m/Y H:i', substr($period[0], 0, -3)),
                'price' => $period[1]
            ];
        } 

        return view('single')->with('currency', $currency)->with('priceHistory', $priceHistoryFormated);
    }
}
