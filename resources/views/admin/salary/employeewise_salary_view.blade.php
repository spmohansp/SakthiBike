@extends('admin.layouts.master')

@section('Current-Page')
{{ $Employee->name }} Salary
@endsection

@section('Parent-Menu')
Salary
@endsection

@section('Menu')
view Salary
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
          <div class="tile-body">
            <table class="table ">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($Salaries as $Salary)
                  @if($Salary->attendence!=0)
                    <tr>
                      <td>{{ date('d-m-Y',strtotime($Salary->AttendenceDate->date)) }}</td>
                      <td><a href="{{ action('BillingController\SalaryController@edit',$Salary->AttendenceDate->id) }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true" style="color:#fff"></i></a></td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      </div>
    </div>

@endsection

