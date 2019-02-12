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
            <button class="btn btn-primary" type="button" onclick="window.location.href='{{ url('/admin/product/view') }}'">View Products</button>
          </div>
        </div><br>
        <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8 ">
          <div class="">
            <div class="row">
              <div class="col-lg-12">
                <form action="{{ route('admin.saveClient') }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <select class="form-control form-control-lg" >
                          <option>--Select Product Id--</option>
                          <option></option>
                          <option></option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input class="form-control form-control-lg" id="" type="number" aria-describedby="emailHelp" placeholder="Quantity" name="phone_no">
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <input class="form-control form-control-lg" id="" type="number" aria-describedby="emailHelp" placeholder="Amount" name="gst" >
                  </div>
                  <div class="form-group">
                    <input class="form-control form-control-lg" id="" type="date" aria-describedby="emailHelp" placeholder="" name="notes">
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
    </div>
  @endsection