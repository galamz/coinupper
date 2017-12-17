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


</head>
<body>
    <div id="app">
        <div class="bg-primary globe-data py-1 text-white">
            <div class="container">
                <div class="row">
                    <div class="col">Cryptocurrencies: <a href="#">{!! $hi !!}</a></div>
                    <div class="col">Markets: <a href="#">{!! $hi !!}</a></div>
                    <div class="col">Market Cap: <a href="#">{!! $hi !!}</a></div>
                    <div class="col">24h Vol: <a href="#">{!! $hi !!}</a></div>
                    <div class="col">BTC Dominance: <a href="#">{!! $hi !!}</a></div>
                    <div class="col">BTC Price: ${!! $BTC_price_usd !!}</div>
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
                            <a class="nav-link" href="{!! route('all') !!}">Markets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('all') !!}">Converter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{!! route('all') !!}">Widget</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{!! route('login') !!}">Register</a></li>
                        <li class="nav-item"><a class="nav-link" href="{!! route('login') !!}">Login</a></li>
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


    <div class="bg-dark py-3 text-center text-white mt-3">
        hello
    </div>

    <footer class="bg-dark py-3 text-center text-white">
        hi
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')
</body>
</html>
