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
      <div class="pad">
        <div class="row">
          <div class="col-lg-8">
          </div>
          <div class="col-lg-4">
            <button class="btn btn-primary" type="button" onclick="window.location.href='{{ url('/admin/clients') }}'">View Clients</button>
          </div>
        </div><br>
        <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8 ">
          <div class="">
            <div class="row">
              <div class="col-lg-12">
                <form action="{{ route('admin.storeproduct') }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <input class="form-control form-control-lg" id="" type="" aria-describedby="emailHelp" placeholder="Enter Product ID" name="Product_ID">
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                          <input class="form-control form-control-lg" id="" type="text" aria-describedby="emailHelp" placeholder="Product Name (English)" name="Product_Name_English">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                          <input class="form-control form-control-lg" id="" type="text" aria-describedby="emailHelp" placeholder="Product Name (Tamil)" name="Product_Name_Tamil">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                          <input class="form-control form-control-lg" id="" type="text" aria-describedby="emailHelp" placeholder="Cost Price" name="Cost_Price">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                          <input class="form-control form-control-lg" id="" type="text" aria-describedby="emailHelp" placeholder="Expense" name="Expense">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                          <input class="form-control form-control-lg" id="" type="text" aria-describedby="emailHelp" placeholder="Selling Price" name="Selling_Price">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                          <input class="form-control form-control-lg" id="" type="text" aria-describedby="emailHelp" placeholder="Selling Price With Tax" name="Selling_Price_With_Tax">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                          <input class="form-control form-control-lg" id="" type="text" aria-describedby="emailHelp" placeholder="CGST" name="CGST">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                          <input class="form-control form-control-lg" id="" type="text" aria-describedby="emailHelp" placeholder="SGST" name="SGST">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                          <input class="form-control form-control-lg" id="" type="text" aria-describedby="emailHelp" placeholder="CESS" name="CESS">
                      </div>
                    </div>
                  </div>
              <div class="">
                <button class="btn btn-primary" type="submit">Add Client</button>
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