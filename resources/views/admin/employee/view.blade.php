@extends('admin.layouts.master')

@section('Current-Page')
View Emoloyee
@endsection

@section('Parent-Menu')
Stock
@endsection

@section('Menu')
View Emoloyee
@endsection

@section('content')

<div class="tile">
      <div class="pad">
        <div class="row">
          <div class="col-lg-10">

          </div>
          <div class="col-lg-2">
            <button class="btn btn-primary" type="button" onclick="window.location.href='{{ action('BillingController\EmployeeController@create') }}'">Add Employee</button>
          </div>
        </div><br>
        <div class="row">
        <div class="col-md-12">
          <div class="">
            <div class="tile-body table-responsive">
              <table class="table ">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Employee Id</th>
                    <th>Address</th>
                    <th>Salary Per/DAy</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($Employees as $Employee)
                    <tr>
                      <td>{{ $Employee->name }}</td>
                      <td>{{ $Employee->mobile }}</td>
                      <td>{{ $Employee->address }}</td>
                      <td>{{ $Employee->amount_per_day }}</td>
                      <td>
                        <form action="{{ action('BillingController\EmployeeController@destroy',$Employee->id) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <a href="{{ action('BillingController\EmployeeController@edit',$Employee->id) }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true" style="color:#fff"></i></a>
                            <button href="" onclick="return confirm('Are you sure?')" class="btn btn-primary"><i class="fa fa-trash-o"  aria-hidden="true" style="color:#fff" ></i></button>
                        </form>
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