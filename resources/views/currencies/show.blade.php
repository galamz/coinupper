@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Auth::check())
            <div class="bg-dark p-2">
                <a class="btn btn-info btn-sm" href="{!! route('currency.show',$CryptoCurrency) !!}" >Show Dashboard</a>
                <a class="btn btn-warning btn-sm" href="{!! route('currency.show',$CryptoCurrency) !!}" >Edit</a>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <div class="d-flex align-items-stretch">
                            <div>
                                @unless(is_null($CryptoCurrency->logo))
                                    <span><img class="img-circle" src="{!! asset('images/64x64/'.$CryptoCurrency->logo) !!}" alt="{!! strtolower($CryptoCurrency->name) !!}" width="64" height="64" ></span>
                                @else
                                    <span class="bg-dark py-1 px-2 rounded-circle ">{!! $CryptoCurrency->symbol[0] !!}</span>
                                @endif
                            </div>
                            <div class="pl-3 align-middle">
                                <h1>{!! $CryptoCurrency->name !!} <small>({!! $CryptoCurrency->symbol !!})</small></h1>
                            </div>
                        </div>
                        <ul class="nav flex-column">
                            @foreach($CryptoCurrency->info as $custom)
                                <li class="nav-item"><a class="nav-link px-0 py-0" rel="nofollow" target="_blank" href="{!! $custom->value !!}"><i class="icon icon-home mr-1"></i>{!! $custom->name !!}</a></li>
                            @endforeach
                            <li><span class="badge badge-success">Rank {!! $CryptoCurrency->rank !!}</span></li>
                        </ul>
                    </div>
                    <div class="col-sm-8 col-12">
                        <div class="h3">${!!  number_format($CryptoCurrency->price_usd,2,',','.') !!} <small>USD</small>
                            <span class="{!! ($CryptoCurrency->percent_change_24h < 0 ? 'text-danger' : 'text-success') !!}">
                            ({!! number_format($CryptoCurrency->percent_change_24h,2) !!}%)
                                <i class="ml-1 icon icon-caret-{!! ($CryptoCurrency->percent_change_24h < 0 ? 'down' : 'up') !!}" aria-hidden="true"></i>
                        </span>
                        </div>
                        <div>${!! $CryptoCurrency->price_btc !!} <small>BTC</small></div>
                    </div>
                </div>
            </div>
            <table class="table table-striped mb-0">
                <thead class="thead-light">
                <tr>
                    <th>Market Cap</th>
                    <th>Volume (24h)</th>
                    <th>Circulating Supply</th>
                    <th>Max Supply</th>
                </tr>
                </thead>
                <tr>
                    <td>
                        <div class="font-weight-bold">{!! number_format($CryptoCurrency->market_cap_usd,0,',','.') !!} USD</div>
                        <div class="text-muted">{!! number_format($CryptoCurrency->market_cap_usd / $globalData['BTC_price_usd'] ,0,',','.') !!} BTC</div>
                    </td>
                    <td>
                        <div class="font-weight-bold">{!! number_format($CryptoCurrency->volume_24h_usd,0,',','.') !!} USD</div>
                        <div class="text-muted">{!! number_format($CryptoCurrency->volume_24h_usd / $globalData['BTC_price_usd'] ,0,',','.') !!} BTC</div>
                    </td>
                    <td>
                        <div class="font-weight-bold">{!! number_format($CryptoCurrency->available_supply,0,',','.') !!} USD</div>
                        <div class="text-muted">{!! number_format($CryptoCurrency->available_supply / $globalData['BTC_price_usd'] ,0,',','.') !!} BTC</div>
                    </td>
                    <td>
                        <div class="font-weight-bold">{!! number_format($CryptoCurrency->max_supply,0,',','.')  !!} USD</div>
                        <div class="text-muted">{!! number_format($CryptoCurrency->max_supply / $globalData['BTC_price_usd'] ,0,',','.') !!} BTC</div>
                    </td>
                </tr>
            </table>

        </div>

        <div class="row justify-content-center">
            <div class="col">
                <div class="card my-3">
                    <div class="card-header">
                        Currency Exchange
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" value="{!! Request::get('from',1) !!}" data-price-usd="{!! $CryptoCurrency->price_usd !!}" placeholder="0.987" class="from-currency action-currency form-control" aria-label="Text input with checkbox">
                                    <span class="input-group-addon">{!! $CryptoCurrency->symbol !!}</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="text" class="form-control action-currency to-currency" aria-label="Text input with radio button">
                                    <select  class="form-control action-currency form-control-chosen currency" readonly="" data-placeholder="Please select...">
                                        <optgroup label="Currency">
                                            @foreach($currencies as $currency)
                                                <option data-price-usd="{!! $currency->price_usd !!}">{!! $currency->name.' ('.$currency->symbol.')' !!}</option>
                                            @endforeach
                                        </optgroup>

                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                <div class="tab-pane fade show active" id="nav-home" style="height: 500px" role="tabpanel" aria-labelledby="nav-home-tab">
                    @include('layouts.currencies-chart',['CryptoCurrency' => $CryptoCurrency])
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        $('.action-currency').bind('keyup keydown click change',function(){
            var fromCurrency        = $('.from-currency');
            var quntiy              = fromCurrency.val();

            var priceFromUsd        = fromCurrency.data('price-usd');
            var selectedCurrency    = $(".currency option:selected").data('price-usd');

            var cal = parseFloat(priceFromUsd) * parseFloat(quntiy) / parseFloat(selectedCurrency);

            cal = parseFloat(cal);

            if(isNaN(cal)) cal = 0;

            console.log(cal);


            $('.to-currency').val(cal);

            // alert(priceFrom);
        });
    </script>
@endpush


