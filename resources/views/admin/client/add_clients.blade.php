@extends('admin.layouts.master')

@section('Current-Page')
Add Customer
@endsection

@section('Parent-Menu')
Customer
@endsection

@section('Menu')
Add Customer
@endsection

@section('content')
    
    <div class="tile">
        <div class="row">
          <div class="col-lg-12">
            <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ url('/admin/clients') }}'">View Clients</button>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-12 ">
            <form action="{{ route('admin.saveClient') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <input class="form-control form-control-lg" id="" type="" aria-describedby="emailHelp" placeholder="Enter Customer Name" name="name">
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
                    <input class="form-control form-control-lg" id="" type="text" aria-describedby="emailHelp" placeholder="Enter Bike Number" name="bike_no">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <input class="form-control form-control-lg" id="" type="" aria-describedby="emailHelp" placeholder="Enter Bike Name" name="bike_name">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <input class="form-control form-control-lg" id="" type="text" aria-describedby="emailHelp" placeholder="Enter Service Km" name="service_km">
                  </div>
                </div>
              </div>
              <div class="">
                <button class="btn btn-primary" type="submit">Add Client</button>
              </div>
            </form>
          </div>
        </div>
    </div>
  @endsection