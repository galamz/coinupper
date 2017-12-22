@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1>All Markets</h1>
        </div>

        <div class="card">
            <table class="table table-striped table-hover mb-0">
                <thead class="thead">
                    <tr>
                        <th>Name</th>
                    </tr>
                </thead>

                @foreach($markets as $market)
                    <tr>
                        <td>{!! $market->name !!}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
