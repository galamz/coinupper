@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-body">
            <div class="row">
                <div class="col-5">
                    <h1>{!! $CryptoCurrency->name !!} <small>({!! $CryptoCurrency->symbol !!})</small></h1>
                </div>
                <div class="col">
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
            <nav class="nav nav-tabs" id="myTab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show p-2 active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    {!! print_r($CryptoCurrency) !!}

                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
            </div>
        </div>
    </div>
@endsection
