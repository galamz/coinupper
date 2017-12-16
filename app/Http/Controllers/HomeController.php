<?php

namespace App\Http\Controllers;

use App\CryptoCurrency;
use Illuminate\Http\Request;
use Swap;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data['CryptoCurrency'] = $CryptoCurrency  = CryptoCurrency::orderBy('id')->paginate(100);


        return view('home',$data);
    }
}
