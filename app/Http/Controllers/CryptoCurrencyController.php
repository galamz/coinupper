<?php

namespace App\Http\Controllers;

use App\CryptoCurrency;
use App\Data;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CryptoCurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function show($slug)
    {
        $data['CryptoCurrency'] = $CryptoCurrency   = CryptoCurrency::whereSlug($slug)->firstOrFail();

        $data['currencies']     = $currencies       = CryptoCurrency::where('id','<>',$CryptoCurrency->id)->orderBy('rank')->get();

//        $dt = Data::all()->where('id_crypto_currencie','=',$CryptoCurrency->id);


        return view('currencies.show',$data);
    }

    public function graph($slug,$from = null,$to = null){


        $CryptoCurrency = CryptoCurrency::whereSlug($slug)->firstOrFail(['id']);

        $dataCryptoCurrency = Data::whereIdCryptoCurrencie($CryptoCurrency->id)->get(['market_cap_by_available_supply','time','price_usd','price_btc','volume_usd']);

        if($dataCryptoCurrency->isEmpty()) return null;

        foreach ($dataCryptoCurrency as $item){

            $timeToTimestamp = Carbon::parse($item->time)->timestamp * 1000;

            $market_cap_supply      = intval($item->market_cap_by_available_supply);
            $price_usd      = intval($item->price_usd);
            $price_btc      = intval($item->price_btc);
            $volume_usd     = intval($item->volume_usd);


            $iss['market_cap_supply'][] = [$timeToTimestamp,intval($market_cap_supply)];
            $iss['price_usd'][]         = [$timeToTimestamp,$price_usd];
            $iss['price_btc'][]         = [$timeToTimestamp,$price_btc];
            $iss['volume_usd'][]        = [$timeToTimestamp,$volume_usd];

        }
        return response()->json($iss);
    }

    public function searchJson(){

        $data['currencies']     = $currencies       = CryptoCurrency::orderBy('rank')->get();

        $curr = [];
        foreach ($currencies as $currency){
            $curr[] = [
                'value' => $currency->name.' ('.$currency->symbol.')',
                'url' => route('currencies.show',['slug'=> $currency->slug])
            ];
        }

        return response()->json($curr);

    }

}
