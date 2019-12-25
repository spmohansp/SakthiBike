@extends('admin.layouts.master')

@section('Current-Page')
View Clients
@endsection

@section('Parent-Menu')
Clients
@endsection

@section('Menu')
View Clients
@endsection

@section('content')
    <div class="tile">
      <div class="pad">
        <div class="row">
          <div class="col-lg-10">

          </div>
          <div class="col-lg-2">
            <button class="btn btn-primary" type="button" onclick="window.location.href='{{ url('admin/client/add') }}'">Add Clients</button>
          </div>
        </div><br>
        <div class="row">
        <div class="col-md-12">
          <div class="">
            <div class="tile-body table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Bike Number</th>
                    <th>Bike Name</th>
                    <th>Bike Model</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($Clients as $key=>$Client)
                      <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $Client->name }}</td>
                        <td>{{ $Client->phone_number }}</td>
                        <td>{{ $Client->bike_no }}</td>
                        <td>{{ @$Client->VehicleName->name }}</td>
                        <td>{{ $Client->bike_name }}</td>
                        <td>
                          <a href="{{ route('admin.editClient',$Client->id) }}"><button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true" style="color:#fff"></i></button></a>
                          <a href="{{ route('admin.deleteClient',$Client->id) }}"> <button class="btn btn-primary" onclick="return confirm('Are you sure?')"> <i class="fa fa-trash" aria-hidden="true" style="color:#fff" ></i></button></a>
                        </td>
                      </tr>
                   @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  @endsection
