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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/all/cryptocurrency', 'HomeController@all')->name('all');

Route::get('currencies/{slug}','CryptoCurrencyController@show')->name('currencies');
Route::get('currencies/{slug}/graph','CryptoCurrencyController@graph')->name('currencies.graph');


Route::get('search.json','CryptoCurrencyController@searchJson')->name('search.json');
Route::get('search','CryptoCurrencyController@search')->name('search.index');

Route::get('widget','HomeController@widget')->name('widget.index');
Route::get('calculator','HomeController@calculator')->name('calculator.index');
Route::resource('markets','MarketsController');


Route::get('get','CoinMarketCapController@index');
Route::get('bitcoin/{id}','CoinMarketCapController@show');

