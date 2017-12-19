@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1>All CryptoCurrencies</h1>
        </div>
        <div class="card mb-3">
            <table class="table table-striped table-hover table-data mb-0 mt-0 table-sm" cellspacing="0" width="100%">
                <thead>
                <tr class="align-middle text-right">
                    <th class="text-center">#</th>
                    <th class="text-left">Name</th>
                    <th>Market Cap</th>
                    <th>Price</th>
                    <th>Circulating Supply</th>
                    <th>Volume (24h)</th>
                    <th>% 1h</th>
                    <th>% 24h</th>
                    <th>% 7d</th>
                </tr>
                </thead>
                <tbody>
                @foreach($CryptoCurrency as $Currency)
                    <tr class="align-middle text-right">
                        <td class="text-center font-weight-bold">{!! $Currency->rank !!}</td>
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
                            <small class="font-italic">{!! number_format($Currency->market_cap_usd / $BTC_price_usd,0,',','.') !!} BTC</small>
                        </td>
                        <td>
                            <a class="font-weight-bold d-block" href="{!! route('currencies',['slug' => $Currency->slug]) !!}">
                                ${!! number_format($Currency->price_usd,2,',','.') !!}
                            </a>
                            <small class="font-italic">{!! $Currency->price_btc !!} BTC</small>
                        </td>
                        <td>${!! number_format($Currency->available_supply,0) !!}</td>
                        <td><a target="_blank" rel="nofollow" href="{!! $Currency->circulating_url !!}">{!! number_format($Currency->available_supply).' '.$Currency->symbol !!}</a></td>
                        <td>
                        <span class="font-weight-bold {!! ($Currency->percent_change_1h < 0 ? 'text-danger' : 'text-success') !!}">
                            {!! number_format($Currency->percent_change_1h,2) !!}
                            <i class="ml-1 icon icon-arrow-{!! ($Currency->percent_change_1h < 0 ? 'down' : 'up') !!}" aria-hidden="true"></i>
                        </span>
                        </td>
                        <td>
                        <span class="font-weight-bold {!! ($Currency->percent_change_24h < 0 ? 'text-danger' : 'text-success') !!}">
                            {!! number_format($Currency->percent_change_24h,2) !!}
                            <i class="ml-1 icon icon-arrow-{!! ($Currency->percent_change_24h < 0 ? 'down' : 'up') !!}" aria-hidden="true"></i>
                        </span>
                        </td>

                        <td>
                        <span class="font-weight-bold {!! ($Currency->percent_change_7d < 0 ? 'text-danger' : 'text-success') !!}">
                            {!! number_format($Currency->percent_change_7d,2) !!}
                            <i class="ml-1 icon icon-arrow-{!! ($Currency->percent_change_7d < 0 ? 'down' : 'up') !!}" aria-hidden="true"></i>
                        </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>

    </div>
@endsection
