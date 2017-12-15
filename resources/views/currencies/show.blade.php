@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-body">
            <div class="row">
                <div class="col-4">
                    <h1>{!! $CryptoCurrency->name !!} <small>({!! $CryptoCurrency->symbol !!})</small></h1>
                    <ul class="nav flex-column">
                        @foreach($CryptoCurrency->info as $custom)
                            <li class="nav-item"><a class="nav-link" rel="nofollow" target="_blank" href="{!! $custom->value !!}">{!! $custom->name !!}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-8">
                    <div class="h3">${!! $CryptoCurrency->price_usd !!} <small>USD</small></div>
                    <div>${!! $CryptoCurrency->price_btc !!} <small>USD</small></div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Market Cap</th>
                                <th>Volume (24h)</th>
                                <th>Circulating Supply</th>
                                <th>Max Supply</th>
                            </tr>
                        </thead>
                            <tr>
                                <td>{!! $CryptoCurrency->market_cap_usd !!}</td>
                                <td>{!! $CryptoCurrency->volume_24h_usd !!}</td>
                                <td>{!! $CryptoCurrency->circulating !!}</td>
                                <td>{!! $CryptoCurrency->circulating !!}</td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="card card-body my-3">

        </div>

        <div class="card">
            <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="icon icon-line-chart mr-1"></i>Charts</a></li>
                <li class="nav-item"><a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="icon icon-exchange mr-1"></i>Markets</a></li>
                <li class="nav-item"><a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="icon icon-globe mr-1"></i>Social</a></li>
                <li class="nav-item"><a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="icon icon-line-cogs mr-1"></i>Tools</a></li>
                <li class="nav-item"><a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="icon icon-table mr-1"></i>Historical Data</a></li>
            </ul>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    @include('layouts.currencies-chart',['CryptoCurrency' => $CryptoCurrency])
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
            </div>
        </div>

    </div>
@endsection


