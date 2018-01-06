<?php

namespace App\Providers;

use App\CryptoCurrency;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
        URL::forceScheme('https');


        try{


            // need cache 5 min
            $DataBar                = CryptoCurrency::selectRaw('count(id) as CryptoCurrencies, sum(volume_24h_usd) as sumVolume_24h_usd,   sum(market_cap_usd) sumCryptoCurrencies')->first();
            $CryptoCurrencies       = $DataBar->CryptoCurrencies;
            $sumCryptoCurrencies    = number_format($DataBar->sumCryptoCurrencies,2,',','.');
            $sumVolume_24h_usd      = number_format($DataBar->sumVolume_24h_usd,2,',','.');


            $BTC_price  = CryptoCurrency::whereSymbol('BTC')->orderBy('id')->first(['price_usd']);
            $ETH_price  = CryptoCurrency::whereSymbol('ETH')->orderBy('id')->first(['price_usd']);
            $BTC_price_usd = ($BTC_price ? $BTC_price->price_usd : 0 );
            $ETH_price_usd = ($ETH_price ? $ETH_price->price_usd : 0);

        }catch (QueryException $exception){
            $CryptoCurrencies       = 0;
            $sumCryptoCurrencies    = 0;
            $BTC_price_usd          = 0;
            $ETH_price_usd          = 0;
            $sumVolume_24h_usd      = 0;

        }

        $globalData = [
            'CryptoCurrencies'      => $CryptoCurrencies,
            'sumCryptoCurrencies'   => $sumCryptoCurrencies,
            'BTC_price_usd'         => $BTC_price_usd,
            'ETC_price_usd'         => $ETH_price_usd,
            'sumVolume_24h_usd'     => $sumVolume_24h_usd,
        ];

        View::share('globalData', $globalData);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
