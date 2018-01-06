<?php

namespace App\Http\Controllers;

use App\CryptoCurrency;
use \Torann\Currency\Currency;
use Illuminate\Http\Request;
//use Swap;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data['CryptoCurrency'] = $CryptoCurrency  = CryptoCurrency::orderBy('rank')->paginate(100);

        return view('home',$data);
    }

    public function all(){

        $data['CryptoCurrency'] = $CryptoCurrency  = CryptoCurrency::orderBy('rank')->get();
        return view('all',$data);
    }

    public function widget(){
        return view('widget');
    }


    public function calculator(){
        return view('calculator');
    }
}
