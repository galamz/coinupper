<div id="container" style="height: 400px"></div>
@push('scripts')
    <script>

        var processed_json = new Array();
        $.getJSON('{!! route('currencies.graph',['CryptoCurrency' => $CryptoCurrency->slug ]) !!}', function(data) {
            // Populate series
            for (i = 0; i < data.length; i++){
                processed_json.push([data.market_cap_supply[i].key, data[i].value]);
            }

            // draw chart
            $('#container').highcharts({
                chart: {
                    type: "column"
                },
                title: {
                    text: "Student data"
                },
                xAxis: {
                    type: 'category',
                    allowDecimals: false,
                    title: {
                        text: ""
                    }
                },
                yAxis: {
                    title: {
                        text: "Scores"
                    }
                },
                series: [{
                    name: 'Subjects',
                    data: processed_json
                }]
            });
        });
    </script>
@endpush