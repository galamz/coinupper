<?php

namespace App\Http\Controllers;

use App\CryptoCurrency;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['CryptoCurrency'] = $CryptoCurrency  = CryptoCurrency::get();

        return view('home',$data);
    }
}
