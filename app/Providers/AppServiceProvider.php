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
        \Schema::defaultStringLength(199);

        
        try{
            $hi         = CryptoCurrency::count('id');
            $BTC_price  = CryptoCurrency::whereSymbol('BTC')->orderBy('id')->firstOrFail(['price_usd']);
            $BTC_price_usd = $BTC_price->price_usd;

        }catch (QueryException $exception){
            $hi = null;
            $BTC_price_usd = null;

        }

        View::share('hi',$hi);
        View::share('BTC_price_usd',$BTC_price_usd);
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
