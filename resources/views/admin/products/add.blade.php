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
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('admin.storeproduct') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label><h5><b>Product Name</b></h5></label>
                                        <input class="form-control form-control-lg" id="" type="text"
                                        aria-describedby="emailHelp" placeholder="Product Name" name="Product_Name">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <h5 class="pull-left">Select Vehicle Type</h5>
                                    <div class="form-group">
                                        <select class="form-control form-control-lg" name="Vehicle_id">
                                            <option value="">Select Vehicle Type</option>
                                            @foreach($Vehicles as $Vehicle)
                                            <option value={{ $Vehicle->id }}>{{ $Vehicle->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label><h5><b>Select Product Type:</b></h5></label><br>
                                        <label class="radio-inline">
                                            <input type="radio" name="Product_Type" value="ml">Ml
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="Product_Type" value="Litter">Litter
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="Product_Type" value="Kg">Kg
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="Product_Type" value="piece">Piece
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label><h5><b>Cost Price</b></h5></label>
                                        <input class="form-control form-control-lg" id="" type="text"
                                        aria-describedby="emailHelp" placeholder="Cost Price" name="Cost_Price">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label><h5><b>Selling Price</b></h5></label>
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
            </div>
        </div>
    </div>

@endsection
