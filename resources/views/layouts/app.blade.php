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
        <div class="bg-primary-d100 py-1 text-white">
            <div class="container">
                Cryptocurrencies: <a href="#">{!! $hi !!}</a>
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
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/stock/modules/drag-panes.js"></script>
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/stock/indicators/indicators.js"></script>
    <script src="https://code.highcharts.com/stock/indicators/volume-by-price.js"></script>

    @stack('scripts')
</body>
</html>
