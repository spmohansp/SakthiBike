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
            <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ url('/admin/clients') }}'">View Clients</button>
          </div>
        </div>
        <br>
        <div class="row">
              <div class="col-lg-12">
                <form action="{{ route('admin.updateClient',$Client->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                     <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label><b><h5>Customer Name</h5></b></label>
                    <input class="form-control form-control-lg" id="" type="" aria-describedby="emailHelp" placeholder="Enter Customer Name" value="{{ $Client->name }}" name="name" >
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label><b><h5>Phone Number</h5></b></label>
                      <input class="form-control form-control-lg" id="" type="number" aria-describedby="emailHelp" placeholder="Phone Number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" value="{{ $Client->phone_number }}"  name="phone_number" minlength="0" maxlength="10">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label><b><h5>Bike Number</h5></b></label>
                    <input class="form-control form-control-lg" id="" type="text" aria-describedby="emailHelp" placeholder="Enter Bike Number" value="{{ $Client->bike_no }}" name="bike_no">
                  </div>
                </div>
                <div class="col-lg-6">
                <h5 class="pull-left">Select Vehicle Type</h5>
                  <div class="form-group">
                     <select class="form-control form-control-lg" name="Vehicle_id">
                        <option value="">Select Vehicle Type</option>
                        @foreach($Vehicles as $Vehicle)
                          <option value="{{ $Vehicle->id }}" {{ $Client->Vehicle_id == $Vehicle->id ? 'selected' : '' }}>{{ $Vehicle->name}} </option>
                        @endforeach 
                     </select>

                  </div>
               </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label><b><h5>Bike Model</h5></b></label>
                    <input class="form-control form-control-lg" id="" type="" aria-describedby="emailHelp" placeholder="Enter Bike Model" value="{{ $Client->bike_name }}" name="bike_name">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label><b><h5>Service Km</h5></b></label>
                    <input class="form-control form-control-lg" id="" type="text" aria-describedby="emailHelp" placeholder="Enter Service Km" value="{{ $Client->service_km }}" name="service_km">
                  </div>
                </div>
              </div>
                  <div class="">
                    <button class="btn btn-primary" type="submit">Update Client</button>
                  </div>
                </form>
          </div>
        </div>
    </div>
  @endsection