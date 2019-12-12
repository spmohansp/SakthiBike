@extends('admin.layouts.master')

@section('Current-Page')
View Stock
@endsection

@section('Parent-Menu')
Stock
@endsection

@section('Menu')
View Stock
@endsection

@section('content')

    <div class="tile">
        <div class="row ">
          <div class="col-lg-12">
            <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ url('admin/stock/add') }}'">Add Stock</button>
          </div>
        </div>
        <br>
        <div class="row ">
          <div class="col-lg-12">
             <div class="tile-body table-responsive">
            <table class="table">
              <thead>
              <tr>
                <th>S.No</th>
                <th>Shop Name</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($Stock as $Stocks)
                @foreach($Stocks->StockDetail as $key=>$StockDetail)
                @php
                  $BillProduct = App\BillProduct::where('product_id',$StockDetail->product_id)->sum('quantity');
                @endphp
                  <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $Stocks->Shop->name }}</td>
                    <td>{{ $StockDetail->Product->Product_Name }}</td>
                    <td>{{ $StockDetail->Unit - $BillProduct }} </td>
                    <td>{{ date('d-m-Y', strtotime($Stocks->date)) }}</td>
                    <td>
                      <a href="{{ route('admin.editStock',$Stocks->id) }}"><button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true" style="color:#fff"></i></button></a>
                      <a href="{{ route('admin.deleteStock',$Stocks->id) }}"> <button class="btn btn-primary" onclick="return confirm('Are you sure?')"> <i class="fa fa-trash" aria-hidden="true" style="color:#fff" ></i></button></a>
                    </td>
                  </tr>
                @endforeach
              @endforeach
              
            </tbody>
            </table>
          </div>
          </div>
        </div>
    </div>

  @endsection