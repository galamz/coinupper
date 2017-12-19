<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('loginme',function(){
    Auth::loginUsingId(1);
    return redirect()->back();
});

//Route::redirect('home','/');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/cryptocurrency', 'HomeController@all')->name('currencies.index');
Route::get('currencies/{slug}','CryptoCurrencyController@show')->name('currencies.show');
Route::get('currencies/{slug}/graph','CryptoCurrencyController@graph')->name('currencies.graph');


Route::get('search.json','CryptoCurrencyController@searchJson')->name('search.json');
Route::get('search','CryptoCurrencyController@search')->name('search.index');

Route::get('widget','HomeController@widget')->name('widget.index');
Route::get('calculator','HomeController@calculator')->name('calculator.index');
Route::resource('markets','MarketsController');


Route::get('get','CoinMarketCapController@index');
Route::get('bitcoin/{id}','CoinMarketCapController@show');


Route::namespace('Dashboard')->prefix('dashboard')->group(function(){
    Route::get('/','DashboardController@index')->name('dashboard.index');
    Route::resource('currency','CryptoCurrency');
});

