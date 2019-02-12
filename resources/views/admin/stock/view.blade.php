@extends('admin.layouts.master')

@section('Current-Page')
View Stock
@endsection

@section('Parent-Menu')
Transactions
@endsection

@section('Menu')
View Stock
@endsection

@section('content')
    <div class="tile">
      <div class="pad">
        <div class="row section-gap">
          <div class="col-lg-10">

          </div>
          <div class="col-lg-2">
            <button class="btn btn-primary" type="button" onclick="window.location.href='{{ url('admin/stock/add') }}'">Add Stock</button>
          </div>
        </div><br>
        <div class="row ">
          <div class="col-lg-2"></div>
          <div class="col-lg-10 col-xs-12">
              <div class="tile">
                <table class="table">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($Stock as $Stocks)
                      <tr>
                        <td>{{ $Stocks->id }}</td>
                        <td>{{ $Stocks->Products->Product_Name_English }}</td>
                        <td>{{ $Stocks->quantity }}</td>
                        <td>{{ $Stocks->amount }}</td>
                        <td>{{ $Stocks->date }}</td>
                        <td>
                          <a href="{{ route('admin.editStock',$Stocks->id) }}"><button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true" style="color:#fff"></i></button></a>
                          <a href="{{ route('admin.deleteStock',$Stocks->id) }}"> <button class="btn btn-primary" onclick="return confirm('Are you sure?')"> <i class="fa fa-trash" aria-hidden="true" style="color:#fff" ></i></button></a>
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
  @endsection