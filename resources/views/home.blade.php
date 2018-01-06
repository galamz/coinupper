@extends('layouts.app')

@section('content')
<div class="container">

    <div class="mb-3">
        <div class="row">
            <div class="col">
                {!! Form::open(['route' => 'home','method' => 'get']) !!}
                <input type="text" id="cryptocurrency" placeholder="Search.." class="form-control">
                {!! Form::close() !!}
            </div>
            <div class="col">
                {!! $CryptoCurrency->links('vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <table class="table table-striped bg-white table-data mb-0 mt-0 table-sm" cellspacing="0" width="100%">
            <thead>
            <tr class="align-middle text-right">
                <th class="text-center">#</th>
                <th class="text-left">Name</th>
                <th>Market Cap</th>
                <th>Price</th>
                <th>Volume (24h)</th>
                <th>Circulating Supply</th>
                <th>Change (24h)</th>
                <th>Price Graph (7d)</th>
            </tr>
            </thead>
            <tbody>
            @foreach($CryptoCurrency as $Currency)
                <tr class="align-middle text-right">
                    <td class="text-center font-weight-bold">{!! $Currency->rank !!}</td>
                    <td class="text-left">
                        <a class="currency-name d-flex align-items-stretch" href="{!! route('currencies.show',['slug' => $Currency->slug]) !!}">
                            @unless(is_null($Currency->logo))
                                <span><img class="img-circle" src="{!! asset('images/32x32/'.$Currency->logo) !!}" alt="{!! strtolower($Currency->name) !!}" width="32" height="32" ></span>
                            @else
                                <span class="bg-dark py-1 px-2 rounded-circle ">{!! $Currency->symbol[0] !!}</span>
                            @endif
                            <span class="ml-2">
                                 <b class="d-inline-block">{!! $Currency->name !!}</b>
                                <small class="d-block text-dark">{!! $Currency->symbol !!}</small>
                            </span>
                        </a>
                    </td>
                    <td class="text-right">
                        ${!! number_format($Currency->market_cap_usd,0,',','.') !!}<br>
                        <small class="font-italic">{!! number_format($Currency->market_cap_usd / $globalData['BTC_price_usd'],0,',','.')  !!} BTC</small>
                    </td>
                    <td>
                        <a class="font-weight-bold d-block" href="{!! route('currencies.show',['slug' => $Currency->slug]) !!}">
                            ${!! number_format($Currency->price_usd,2,',','.') !!}
                        </a>
                        <small class="font-italic">{!! number_format($Currency->price_btc,6,',','.') !!} BTC</small>
                    </td>
                    <td>${!! number_format($Currency->available_supply,0) !!}</td>
                    <td><a target="_blank" rel="nofollow" href="{!! $Currency->circulating_url !!}">{!! number_format($Currency->available_supply).' '.$Currency->symbol !!}</a></td>
                    <td>
                        <span class="font-weight-bold {!! ($Currency->percent_change_24h < 0 ? 'text-danger' : 'text-success') !!}">
                            {!! number_format($Currency->percent_change_24h,2) !!}%
                            <i class="ml-1 icon icon-caret-{!! ($Currency->percent_change_24h < 0 ? 'down' : 'up') !!}" aria-hidden="true"></i>
                        </span>
                    </td>
                    <td class="text-center"><img src="{!! url('soon.svg') !!}" ></td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>

    <div class="row">
        <div class="col">
            * Not Mineable
        </div>
        <div class="col">
            {!! $CryptoCurrency->links('vendor.pagination.bootstrap-4') !!}
        </div>
        <div class="col-12 text-center h3 mt-3">
            Total Market Cap: ${!! $globalData['sumCryptoCurrencies'] !!}
        </div>
    </div>
    <div>
        Last updated: {!! $Currency->updated_at->toDayDateTimeString() !!} UTC
    </div>
</div>
@endsection
