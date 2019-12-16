@extends('admin.layouts.master')

@section('Current-Page')
View Extra Income 
@endsection

@section('Parent-Menu')
Extra Income
@endsection

@section('Menu')
View Extra Income
@endsection

@section('content')
     
    <div class="tile">
      <div class="row">
        <div class="col-lg-12">
          <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ action('BillingController\ExtraIncomeController@create') }}'">Add Extra Incomes</button>
        </div>
      </div><br>
      <div class="row ">
        <div class="col-lg-12 col-xs-12">
          <div class="tile-body table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($ExtraIncomes as $key=>$ExtraIncome)
                <tr>
                  <td>{{ ++$key }}</td>
                  <td>{{ date('d-m-Y',strtotime($ExtraIncome->date)) }}</td>
                  <td>{{ $ExtraIncome->amount }}</td>
                  <td>{{ $ExtraIncome->description }}</td>
                  <td>
                    <a href="{{ action('BillingController\ExtraIncomeController@edit',$ExtraIncome->id) }}"><button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true" style="color:#fff"></i></button></a>
                    <a href="{{ action('BillingController\ExtraIncomeController@destroy',$ExtraIncome->id) }}"> <button class="btn btn-primary" onclick="return confirm('Are you sure?')"> <i class="fa fa-trash" aria-hidden="true" style="color:#fff" ></i></button></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
 @endsection