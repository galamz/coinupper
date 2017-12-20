<?php

namespace App\Providers;

use App\CryptoCurrency;
use Illuminate\Database\QueryException;
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
        try{
            $hi         = CryptoCurrency::count('id');
            $BTC_price  = CryptoCurrency::whereSymbol('BTC')->orderBy('id')->firstOrFail(['price_usd']);
            $ETH_price  = CryptoCurrency::whereSymbol('ETH')->orderBy('id')->firstOrFail(['price_usd']);
            $BTC_price_usd = $BTC_price->price_usd;
            $ETH_price_usd = $ETH_price->price_usd;

        }catch (QueryException $exception){
            $hi = null;
            $BTC_price_usd = 0;
            $ETH_price_usd = 0;

        }

        View::share('hi',$hi);
        View::share('BTC_price_usd',$BTC_price_usd);
        View::share('ETC_price_usd',$ETH_price_usd);
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
