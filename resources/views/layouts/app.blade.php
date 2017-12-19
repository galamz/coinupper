<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//cdn.datatables.net/responsive/2.1.1/css/dataTables.responsive.css"/>



</head>
<body>
    <div id="app">
        <div class="bg-primary globe-data py-1">
            <div class="container">
                <div class="row">
                    <div class="col">Cryptocurrencies: <a href="#">{!! $hi !!}</a></div>
                    <div class="col text-center">Markets: <a href="#">{!! $hi !!}</a></div>
                    <div class="col text-center">Market Cap: <a href="#">{!! $hi !!}</a></div>
                    <div class="col text-center">24h Vol: <a href="#">{!! $hi !!}</a></div>
                    <div class="col text-center">BTC Dominance: <a href="#">{!! $hi !!}</a></div>
                    <div class="col text-right"><span class="badge badge-light badge-pill">ETH : ${!! $BTC_price_usd !!} | BTC: ${!! $BTC_price_usd !!}</span></div>
                </div>

            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
            <div class="container">
                <a class="navbar-brand" href="{!! route('home') !!}">{!! config("app.name") !!}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('all') !!}">All Coins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('markets.index') !!}">Markets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('calculator.index') !!}">Converter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('widget.index') !!}">Widget</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        @unless(Auth::check())
                        <li class="nav-item"><a class="nav-link" href="{!! route('register') !!}">Register</a></li>
                        <li class="nav-item"><a class="nav-link" href="{!! route('login') !!}">Login</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{!! route('dashboard.index') !!}">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="{!! route('login') !!}">Logout</a></li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {!! session('currency','USD') !!}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @foreach(Config::get('swap.currencies') as $currency)
                                <a class="dropdown-item" href="{!! Request::fullUrlWithQuery(['currency' => $currency]) !!}">{!! $currency !!}</a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>


    <div class="bg-dark py-5 text-white mt-3">
        <div class="container">
            <div>
                <div class="h2 text-center">Like what we are doing? Donations are welcome!</div>
            </div>
        </div>
    </div>

    <footer class="bg-dark py-3 text-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="nav">
                        <li class="nav-item">
                            <span class="nav-link">&copy; 2017 {!! config('app.name') !!}</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Disclaimer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Terms of Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Privacy policy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">API</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <span class="nav-link">Follow Us On: </span>
                        </li>
                    </ul>
                </div>
            </div>



        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js"></script>
    <script>


       $.getJSON('{!! route('search.json') !!}',function(data){
            $('#cryptocurrency').autocomplete({
                lookup: data,
                onSelect: function (suggestion) {
                    // alert('You selected: ' + suggestion.value + ', ');
                    location.href = suggestion.url;
                }
            });
        });


    </script>

    @stack('scripts')
</body>
</html>
