@extends('admin.layouts.master')

@section('Current-Page')
    {{ $Shop->name }}  Income
@endsection

@section('Parent-Menu')
    Income
@endsection

@section('Menu')
    Add Income
@endsection

@section('content')
<div class="tile">
    <div class="pad">

        <div class="row">
            <div class="col-lg-12">
                <form action="{{ action('BillingController\ShopController@addPayment') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Date</label>
                                <input class="form-control form-control-lg" type="date" aria-describedby="emailHelp" placeholder="Date" name="date" required="">
                                <input type="hidden" name="shop_id" value="{{ $Shop->id }}">
                            </div>
                        </div> 
                         <div class="col-lg-4">
                            <div class="form-group">
                                <label>Balance</label>
                                <h3>{{ $Balance }}</h3>
                            </div>
                        </div>                              
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Date</label>
                                <input class="form-control form-control-lg" type="text" aria-describedby="emailHelp" placeholder="Amount Paid" name="amount" required="">
                            </div>
                        </div>                              
                    </div>
                    <br>
                    <div class="">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection