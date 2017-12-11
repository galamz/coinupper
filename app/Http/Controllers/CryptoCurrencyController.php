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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show($slug)
    {
        $data['CryptoCurrency'] = $CryptoCurrency = CryptoCurrency::whereSlug($slug)->firstOrFail();

        $dt = Data::all()->where('id_crypto_currencie','=',$CryptoCurrency->id);


        return view('currencies.show',$data);
    }

    public function graph($slug,$from = null,$to = null){


        $CryptoCurrency = CryptoCurrency::whereSlug($slug)->firstOrFail(['id']);

        $dataCryptoCurrency = Data::whereIdCryptoCurrencie($CryptoCurrency->id)->get(['market_cap_by_available_supply','price_usd','price_btc','volume_usd']);

        if($dataCryptoCurrency->isEmpty()) return null;

        foreach ($dataCryptoCurrency as $item){

            $timeToTimestep = Carbon::parse($item->time)->timestamp;

            $market_cap_supply      = number_format($item->market_cap_by_available_supply,2,'.',',');
            $price_usd      = number_format($item->price_usd,2,'.',',');
            $price_btc      = number_format($item->price_btc,2,'.',',');
            $volume_usd     = number_format($item->volume_usd,2,'.',',');


            $iss['market_cap_supply'][] = [$timeToTimestep,$market_cap_supply];
            $iss['price_usd'][]         = [$timeToTimestep,$price_usd];
            $iss['price_btc'][]         = [$timeToTimestep,$price_btc];
            $iss['volume_usd'][]        = [$timeToTimestep,$volume_usd];

        }
        return response()->json($iss);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CryptoCurrency  $cryptoCurrency
     * @return \Illuminate\Http\Response
     */
    public function edit(CryptoCurrency $cryptoCurrency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CryptoCurrency  $cryptoCurrency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CryptoCurrency $cryptoCurrency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CryptoCurrency  $cryptoCurrency
     * @return \Illuminate\Http\Response
     */
    public function destroy(CryptoCurrency $cryptoCurrency)
    {
        //
    }
}
