@extends('admin.layouts.master')

@section('Current-Page')
Edit Product
@endsection

@section('Parent-Menu')
Clients
@endsection

@section('Menu')
Edit Product
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
                                <label><h5><b>Product Name</b></h5></label>
                                <input class="form-control form-control-lg" id="" type="text"
                                    aria-describedby="emailHelp" placeholder="Product Name" value="{{ $Product->Product_Name }}" name="Product_Name">
                            </div>
                        </div>
                         <div class="col-lg-6">
                            <h5 class="pull-left">Select Vehicle Type</h5>
                              <div class="form-group">
                                 <select class="form-control form-control-lg" name="Vehicle_id" >
                                    <option value="">Select Vehicle Type</option>
                                    @foreach($Vehicles as $Vehicle)
                                      <option value="{{ $Vehicle->id }}" {{ $Product->Vehicle_id == $Vehicle->id ? 'selected' : '' }}>{{ $Vehicle->name }} </option>
                                    @endforeach 
                                 </select>
                              </div>
                           </div>
                       </div>
                       <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                               <label><h5><b>Select Product Type:</b></h5></label>
                                  <input type="radio" name="Product_Type" value="ml" {{ $Product->Product_Type == 'ml' ? 'checked' : ''}} >Ml
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="Product_Type" value="Litter" {{ $Product->Product_Type == 'Litter' ? 'checked' : ''}}>Litter
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="Product_Type" value="Kg" {{ $Product->Product_Type == 'Kg' ? 'checked' : ''}}>Kg
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="Product_Type" value="Kg" {{ $Product->Product_Type == 'piece' ? 'checked' : ''}}>Piece
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label><h5><b>Cost Price</b></h5></label>
                                <input class="form-control form-control-lg" id="" type="text"
                                    aria-describedby="emailHelp" placeholder="Cost Price" value="{{ $Product->Cost_Price }}"
                                    name="Cost_Price">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label><h5><b>Selling Price</b></h5></label>
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
