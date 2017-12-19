@extends('dashboard.layouts.appDash')

@section('content')
    <div class="container-fluid">
        <pre>{!! $currency !!}</pre>
        <div class="row">
            <div class="col-6">
                {!! Form::open(['route' => ['currency.update',$currency->id],'method' => 'put']) !!}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{!!  $currency->name !!}" id="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="name">Symbol</label>
                    <input type="text" class="form-control" name="symbol" value="{!!  $currency->symbol !!}" id="symbol" placeholder="symbol">
                </div>

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug" value="{!!  $currency->slug !!}" id="slug" placeholder="Slug">
                </div>

                <div class="form-group">
                    <label for="slug">rank</label>
                    <input type="number" class="form-control" name="rank" value="{!!  $currency->rank !!}" id="rank" placeholder="rank">
                </div>

                <div class="form-group">
                    <label for="algorithm">algorithm</label>
                    <input type="text" class="form-control" name="algorithm" value="{!!  $currency->algorithm !!}" id="algorithm" placeholder="algorithm">
                </div>
                <div class="form-group">
                    <label for="tradingview_id">tradingView</label>
                    <input type="text" class="form-control" name="tradingview_id" value="{!!  $currency->tradingview_id !!}" id="tradingview_id" placeholder="tradingview_id">
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-4">
                            @unless(is_null($currency->logo))
                                <img src="{!! url('images/180x180/'.$currency->logo) !!}" >
                            @else
                                No Logo
                            @endunless
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="logo" value="{!! $currency->logo !!}" id="logo" placeholder="logo">
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">Save</button>
                {!! Form::close() !!}
            </div>
        </div>


    </div>
@endsection


