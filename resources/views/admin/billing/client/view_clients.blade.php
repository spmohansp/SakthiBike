@extends('admin.billing.layouts.master')

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
        <div class="row section-gap">
          <div class="col-lg-10">

          </div>
          <div class="col-lg-2">
            <button class="btn btn-primary" type="button" onclick="window.location.href='{{ url('admin/add_clients') }}'">Add Clients</button>
          </div>
        </div><br>
        <div class="row">
        <div class="col-md-12">
          <div class="">
            <div class="tile-body">
              <table class="table ">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Business Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Notes</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($Client as $Clients)
                  <tr>
                    <td>{{ $Clients->id }}</td>
                    <td>{{ $Clients->name }}</td>
                    <td>{{ $Clients->business_name }}</td>
                    <td>{{ $Clients->email }}</td>
                    <td>{{ $Clients->phone_no }}</td>
                    <td>{{ $Clients->address }}</td>
                    <td>{{ $Clients->notes }}</td>
                    <td></td>
                    <td>
                      <a href="{{ route('admin.editClient',$Clients->id) }}"><button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true" style="color:#fff"></i></button></a>
                            <a href="{{ route('admin.deleteClient',$Clients->id) }}"> <button class="btn btn-primary" onclick="return confirm('Are you sure?')"> <i class="fa fa-trash" aria-hidden="true" style="color:#fff" ></i></button></a>
                    </td>
                  </tr>
                 @endforeach
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  @endsection
