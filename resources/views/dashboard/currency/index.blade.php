@extends('dashboard.layouts.appDash')

@section('content')
    <div class="container-fluid">
        {!! $currencies->links('vendor.pagination.bootstrap-4') !!}

        <div class="card my-3">
            <table class="table table-sm table-striped table-hover mb-0">
                @foreach($currencies as $currency)
                    <tr>
                        <td width="1%"><div>{!! $currency->id !!}</div></td>
                        <td><div class="font-weight-bold">{!! $currency->name !!}</div>
                            <div><a href="{!! route('currency.edit',$currency) !!}" class="font-weight-light font-italic">edit</a></div>
                        </td>
                        <td><div>{!! $currency->price_usd !!} USD</div></td>
                        <td><div>{!! $currency->price_btc !!} BTC</div></td>

                        <td><div>{!! $currency->updated_at !!}</div></td>
                        <td><div>{!! $currency->created_at !!}</div></td>

                    </tr>
                @endforeach
            </table>
        </div>

        {!! $currencies->links('vendor.pagination.bootstrap-4') !!}

    </div>
@endsection
