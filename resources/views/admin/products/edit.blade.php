@extends('admin.layouts.master')

@section('Current-Page')
Add Clients
@endsection

@section('Parent-Menu')
Clients
@endsection

@section('Menu')
Add Clients
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
                <form action="{{ route('admin.updateProduct',$Product->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="form-control form-control-lg" id="" type="text"
                                    aria-describedby="emailHelp" placeholder="Product Name" value="{{ $Product->Product_Name }}" name="Product_Name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="form-control form-control-lg" id="" type="text"
                                    aria-describedby="emailHelp" placeholder="Product Type" value="{{ $Product->Product_Type }}" name="Product_Type">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="form-control form-control-lg" id="" type="text"
                                    aria-describedby="emailHelp" placeholder="Cost Price" value="{{ $Product->Cost_Price }}"
                                    name="Cost_Price">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="form-control form-control-lg calculatevalue" id="Selling_Price" type="text"
                                    aria-describedby="emailHelp" placeholder="Selling Price" value="{{ $Product->Selling_Price }}"
                                    name="Selling_Price">
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <button class="btn btn-primary" type="submit">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
