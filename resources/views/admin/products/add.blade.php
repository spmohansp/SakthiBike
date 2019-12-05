@extends('admin.layouts.master')

@section('Current-Page')
Add Products
@endsection

@section('Parent-Menu')
Products
@endsection

@section('Menu')
Add Products
@endsection

@section('content')

<div class="tile">
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ route('admin.viewProducts') }}'">View
                Product</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('admin.storeproduct') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" id="" type="text"
                                            aria-describedby="emailHelp" placeholder="Product Name" name="Product_Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                <label class="radio-inline"><b>Select Product Type:</b>&nbsp;
                                  <input type="radio" name="Product_Type" value="ml">Ml
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="Product_Type" value="Litter">Litter
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="Product_Type" value="Kg">Kg
                                </label>
                            </div>
                        </div>
                        </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" id="" type="text"
                                            aria-describedby="emailHelp" placeholder="Cost Price" name="Cost_Price">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control form-control-lg calculatevalue" id="Selling_Price" type="text"
                                            aria-describedby="emailHelp" placeholder="Selling Price" name="Selling_Price">
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <button class="btn btn-primary" type="submit">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-2">

                </div>
            </div>
        </div>
    </div>
</div>

@endsection