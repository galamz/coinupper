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
            $hi = CryptoCurrency::sum('market_cap_usd');

        }catch (QueryException $exception){
            $hi = null;
        }

        View::share('hi',$hi);
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
