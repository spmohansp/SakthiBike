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
    <div class="pad">
        <div class="row">
            <div class="col-lg-8">
            </div>
            <div class="col-lg-4">
                <button class="btn btn-primary" type="button" onclick="window.location.href='{{ route('admin.viewProducts') }}'">View
                    Product</button>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('admin.updateProduct',$Product->id) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control form-control-lg" id="" type="text"
                                                aria-describedby="emailHelp" placeholder="Enter Product ID" name="Product_ID" value="{{ $Product->Product_ID }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control form-control-lg" id="" type="number"
                                                aria-describedby="emailHelp" placeholder="Product Min Quantity" name="minimun_quantity" value="{{ $Product->minimun_quantity }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control form-control-lg" id="" type="text"
                                                aria-describedby="emailHelp" placeholder="Product Name (English)" value="{{ $Product->Product_Name_English }}"
                                                name="Product_Name_English">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control form-control-lg" id="" type="text"
                                                aria-describedby="emailHelp" placeholder="Product Name (Tamil)" value="{{ $Product->Product_Name_Tamil }}"
                                                name="Product_Name_Tamil">
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
                                            <input class="form-control form-control-lg" id="" type="text"
                                                aria-describedby="emailHelp" placeholder="Expense" value="{{ $Product->Expense }}"
                                                name="Expense">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control form-control-lg calculatevalue" id="Selling_Price" type="text"
                                                aria-describedby="emailHelp" placeholder="Selling Price" value="{{ $Product->Selling_Price }}"
                                                name="Selling_Price">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control form-control-lg" id="Selling_Price_With_Tax" type="text"
                                                aria-describedby="emailHelp" placeholder="Selling Price With Tax" value="{{ $Product->Selling_Price_With_Tax }}"
                                                name="Selling_Price_With_Tax">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <input class="form-control form-control-lg calculatevalue" id="CGST" type="text"
                                                aria-describedby="emailHelp" placeholder="CGST" name="CGST" value="{{ $Product->CGST }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <input class="form-control form-control-lg calculatevalue" id="SGST" type="text"
                                                aria-describedby="emailHelp" placeholder="SGST" name="SGST" value="{{ $Product->SGST }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <input class="form-control form-control-lg calculatevalue" id="CESS" type="text"
                                                aria-describedby="emailHelp" placeholder="CESS" name="CESS" value="{{ $Product->CESS }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <button class="btn btn-primary" type="submit">Update Product</button>
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
</div>

@endsection
