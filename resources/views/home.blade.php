@extends('layouts.app')

@section('content')
<div class="container">

    <div class="mb-3">
        <div class="row">
            <div class="col">
                <input type="text" placeholder="Search.." class="form-control">
            </div>
            <div class="col">
                {!! $CryptoCurrency->links('vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <table class="table table-striped table-hover table-data mb-0 mt-0 table-sm" cellspacing="0" width="100%">
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
            @php
                if($CryptoCurrency->currentPage() > 1){
                    $iteration = $CryptoCurrency->currentPage() * 100;
                }else{
                    $iteration = 0;
                }
            @endphp
            @foreach($CryptoCurrency as $Currency)
                <tr class="align-middle text-right">
                    <td class="text-center font-weight-bold">{!! $iteration + $loop->iteration !!}</td>
                    <td class="text-left">
                        <a class="currency-name d-flex align-items-stretch" href="{!! route('currencies',['slug' => $Currency->slug]) !!}">
                            <span class="bg-dark py-1 px-2 rounded-circle ">{!! $Currency->symbol[0] !!}</span>
                            <span class="ml-2">
                                 <b class="d-inline-block">{!! $Currency->name !!}</b>
                                <small class="d-block text-dark">{!! $Currency->symbol !!}</small>
                            </span>
                        </a>
                    </td>
                    <td class="text-right">
                        ${!! number_format($Currency->market_cap_usd,0,',','.') !!}<br>
                        <small class="font-italic">{!! number_format($Currency->market_cap_usd / $BTC_price_usd,0,',','.')  !!} BTC</small>
                    </td>
                    <td>
                        <a class="font-weight-bold d-block" href="{!! route('currencies',['slug' => $Currency->slug]) !!}">
                            ${!! number_format($Currency->price_usd,2,',','.') !!}
                        </a>
                        <small class="font-italic">{!! number_format($Currency->price_btc,6,',','.') !!} BTC</small>
                    </td>
                    <td>${!! number_format($Currency->available_supply,0) !!}</td>
                    <td><a target="_blank" rel="nofollow" href="{!! $Currency->circulating_url !!}">{!! number_format($Currency->available_supply).' '.$Currency->symbol !!}</a></td>
                    <td>
                        <span class="font-weight-bold {!! ($Currency->percent_change_24h < 0 ? 'text-danger' : 'text-success') !!}">
                            {!! number_format($Currency->percent_change_24h,2) !!}%
                            <i class="ml-1 icon icon-arrow-{!! ($Currency->percent_change_24h < 0 ? 'down' : 'up') !!}" aria-hidden="true"></i>
                        </span>
                    </td>
                    <td class="text-center"><img src="holder.js/100x40" ></td>
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
            Total Market Cap: $551,536,357,871
        </div>
    </div>
    <div>
        Last updated: Dec 16, 2017 11:15 PM UTC
    </div>
</div>
@endsection
