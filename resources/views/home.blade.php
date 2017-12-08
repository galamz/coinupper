@extends('layouts.app')

@section('content')
<div class="container">
        <table class="table table-striped table-hover table-data mb-0 table-sm" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
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
                        <td class="text-center">{!! $iteration + $loop->iteration !!}</td>
                        <td class="text-left"><a href="{!! route('currencies',['slug' => $Currency->slug]) !!}">{!! $Currency->name !!}</a></td>
                        <td class="text-right">
                            ${!! number_format($Currency->market_cap_usd,0,',','.') !!}
                        </td>
                        <td>
                            <a href="{!! route('currencies',['slug' => $Currency->slug]) !!}">
                                ${!! number_format($Currency->price_usd,2,',','.') !!}
                            </a>
                        </td>
                        <td>{!! $Currency->volume_24h_usd !!}</td>
                        <td>{!! $Currency->circulating !!}</td>
                        <td>{!! $Currency->volume_24h_usd !!}</td>
                        <td class="text-center"><img src="holder.js/100x40" ></td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    {!! $CryptoCurrency->links() !!}

</div>
@endsection
