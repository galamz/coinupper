<div id="container" style="height: 600px"></div>
@push('scripts')
    <script>

        $.getJSON('{!! route('currencies.graph',['CryptoCurrency' => $CryptoCurrency->slug ]) !!}', function(data) {
            // Populate series
            console.log(data);

            Highcharts.stockChart('container', {
                rangeSelector: {
                    selected: 2
                },
                chart: {
                    zoomType: 'xy',
                    alignTicks: false

                },
                title: {
                    text: 'USD to EUR exchange rate over time'
                },
                subtitle: {
                    text: document.ontouchstart === undefined ?
                        'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
                },
                xAxis: [{
                    type: 'linear',
                    dateTimeLabelFormats: { // don't display the dummy year
                        month: '%e. %b',
                        year: '%y'
                    },
                    title: {
                        text: 'Date'
                    }
                }],
                yAxis: [{
                    startOnTick: false,
                    endOnTick: false,
                    labels: {
                        align: 'right',
                        x: -3
                    },
                    title: {
                        text: 'Price USD'
                    },
                    height: '60%',
                    lineWidth: 2,
                    resize: {
                        enabled: true
                    }
                },{
                    labels: {
                        align: 'right'
                    },
                    title: {
                        text: 'Market Cap'
                    },
                    height: '60%',
                    lineWidth: 2,
                    resize: {
                        enabled: true
                    }
                }, {
                    labels: {
                        align: 'right',
                        x: -3
                    },
                    title: {
                        text: 'Volume'
                    },
                    top: '65%',
                    height: '40%',
                    offset: 0,
                    lineWidth: 2
                }],
                tooltip: {
                    split: true
                },

                scrollbar: {
                    enabled: false
                },
                series: [{
                    type: 'spline',
                    name: 'Price (USD)',
                    id: 'aapl',
                    zIndex: 2,
                    data: data.price_usd
                },{
                    name: 'Market Cap',
                    type: 'spline',
                    zIndex: 1,
                    data: data.market_cap_supply
                },{
                    type: 'spline',
                    name: 'Price (BTC)',
                    data: data.price_btc
                },{
                    type: 'column',
                    name: '24h Vol:',
                    id: 'volume',
                    yAxis: 2,
                    data: data.volume_usd
                }]
            });

            });
    </script>
@endpush