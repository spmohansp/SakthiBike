@extends('admin.layouts.master') 

@section('Current-Page') 
Add Shops 
@endsection 

@section('Parent-Menu') 
Shops 
@endsection 

@section('Menu') 
Add Shops 
@endsection 

@section('content')

<div class="tile">
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ action('BillingController\ShopController@index') }}'">View Shop
            </button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ action('BillingController\ShopController@store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="" type="text" aria-describedby="emailHelp" placeholder="Enter Shop Name" value="{{ old('name') }}" name="name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="" type="number" aria-describedby="emailHelp" placeholder="Phone Number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" value="{{ old('phone_number') }}" name="phone_number" minlength="0" maxlength="10">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <textarea class="form-control form-control-lg" id="" type="text" aria-describedby="emailHelp" placeholder="Shop Address" name="address">{{ old('address') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-7">
                                <button class="btn btn-primary pull-right" type="submit">Add Shop</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection