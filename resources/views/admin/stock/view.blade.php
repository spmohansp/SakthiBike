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
            <table class="table">
              <thead>
              <tr>
                <th>S.No</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($Stock as $Stocks)
              @php $ProductId = implode(",",$Stocks->StockDetail->pluck('id')->toArray());
                $BillProduct = App\BillProduct::where('product_id',$ProductId)->sum('quantity');
              @endphp

                <tr>
                  <td>{{ $Stocks->id }}</td>
                  <td>{{ implode(",",$Stocks->StockDetail->pluck('Product')->pluck('Product_Name')->toArray()) }}</td>
                  <td>{{ implode(",",$Stocks->StockDetail->pluck('Unit')->toArray()) -$BillProduct }} </td>
                  <td>{{ date('d-m-Y', strtotime($Stocks->date)) }}</td>
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

  @endsection