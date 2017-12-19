<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Support\Facades\Validator;

class CryptoCurrency extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['currencies'] = $currencies = \App\CryptoCurrency::paginate(50);

        return view('dashboard.currency.index',$data);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['currency'] = $currency = \App\CryptoCurrency::findOrFail($id);
        return view('dashboard.currency.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data['currency'] = $currency = \App\CryptoCurrency::findOrFail($id);

        $validation = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required',
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation);
        }

        $slugName = str_slug($request->name);


        if($currency->logo != $request->logo){

            $img = Image::make($request->logo);

            $extension = pathinfo($request->logo,PATHINFO_EXTENSION);

            $request->logo = $slugName.'.'.$extension;

            $img->resize(265, 265)->save(public_path('images/265x265/'.$request->logo));
            $img->resize(180, 180)->save(public_path('images/180x180/'.$request->logo));
            $img->resize(64, 64)->save(public_path('images/64x64/'.$request->logo));
            $img->resize(32, 32)->save(public_path('images/32x32/'.$request->logo));
            $img->resize(16, 16)->save(public_path('images/16x16/'.$request->logo));

        }

        $currency->update([
           'name'               => $request->name,
           'slug'               => str_slug($request->slug),
           'symbol'             => $request->symbol,
           'rank'               => $request->rank,
           'algorithm'          => $request->algorithm,
           'tradingview_id'     => $request->tradingview_id,
           'logo'               => $request->logo,
        ]);

        return redirect()->back()->with('success','This Currency has been Update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
