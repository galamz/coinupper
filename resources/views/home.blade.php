@extends('layouts.app')

@section('content')
<div class="container">
        <table class="table table-striped table-data mb-0 table-sm">
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
            @foreach($CryptoCurrency as $Currency)
                <tr class="align-middle text-center">
                    <td>{!! $loop->iteration !!}</td>
                    <td><a href="{!! route('currencies',['slug' => $Currency->slug]) !!}">{!! $Currency->name !!}</a></td>
                    <td>{!! $Currency->market_cap !!}</td>
                    <td>{!! $Currency->price !!}</td>
                    <td>{!! $Currency->volume_24h !!}</td>
                    <td>{!! $Currency->circulating !!}</td>
                    <td>{!! $Currency->volume_24h !!}</td>
                    <td class="text-center"><img src="holder.js/100x40" ></td>
                </tr>
            @endforeach
            </tbody>

        </table>

</div>
@endsection
