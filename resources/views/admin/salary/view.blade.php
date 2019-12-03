@extends('admin.layouts.master')

@section('Current-Page')
View Attendence 
@endsection

@section('Parent-Menu')
Stock
@endsection

@section('Menu')
view Attendence
@endsection

@section('content')


 <div class="tile">
      <div class="pad">
        <div class="row">
          <div class="col-lg-10">

          </div>
          <div class="col-lg-2">
            <button class="btn btn-primary" type="button" onclick="window.location.href='{{ action('BillingController\SalaryController@create') }}'">Add Attendence</button>
          </div>
        </div><br>
        <div class="row">
        <div class="col-md-12">
          <div class="">
            <div class="tile-body">
              <table class="table ">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>From Date & Time</th>
                    <th>TO Date & Time</th>
                    <th>Salary Per/Day</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($Salaries as $Salary)
                  <tr>
                    <td>{{ $Salary->name }}</td>
                    <td>{{ $Salary->from_date }}</td>
                    <td>{{ $Salary->to_date }}</td>
                    <td>{{ $Salary->amount_per_day }}</td>
                   
                    <td>
                      <form action="{{ action('BillingController\SalaryController@destroy',$Salary->id) }}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="DELETE">
                          <a href="{{ action('BillingController\SalaryController@edit',$Salary->id) }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true" style="color:#fff"></i></a>
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