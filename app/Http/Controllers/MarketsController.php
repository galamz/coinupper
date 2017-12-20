<?php

namespace App\Http\Controllers;

use App\Markets;
use Illuminate\Http\Request;

class MarketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['markets'] = Markets::get();
        return view('markets.index',$data);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Markets  $markets
     * @return \Illuminate\Http\Response
     */
    public function show(Markets $markets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Markets  $markets
     * @return \Illuminate\Http\Response
     */
    public function edit(Markets $markets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Markets  $markets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Markets $markets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Markets  $markets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Markets $markets)
    {
        //
    }
}
