<?php

namespace App\Http\Controllers;

use App\CryptoCurrency;
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
        return CryptoCurrency::whereSlug($slug)->firstOrFail();
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
