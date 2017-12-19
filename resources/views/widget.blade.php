@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1>CryptoCurrency Price Ticker Widget</h1>
        </div>
        <div class="row">
            <div class="col-8">
                <form>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label">Email</label>
                        <div class="col-sm-7">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-5 col-form-label">Password</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
