@extends('admin.layouts.master')

@section('Current-Page')
View Products
@endsection

@section('Parent-Menu')
Products
@endsection

@section('Menu')
View Products
@endsection

@section('content')
    <div class="tile">
      <div class="pad">
        <div class="row">
          <div class="col-lg-10">

          </div>
          <div class="col-lg-2">
            <button class="btn btn-primary" type="button" onclick="window.location.href='{{ url('admin/product/add') }}'">Add Product</button>
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
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Remaining Quantity</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($details as $key=>$detail)
                      <tr>
                        <td> {{ ++$key }}</td>
                        <td> {{ $detail->Product_ID }}</td>
                        <td> {{ $detail->Product_Name_English }}</td>
                        <td>{{ auth()->user()->RemainingProducts($detail->id) }}</td>
                        <td> {{ $detail->Cost_Price }}</td>
                        <td>
                          <a href="{{ route('admin.editProduct',$detail->id) }}"><button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true" style="color:#fff"></i></button></a>
                          <a href="{{ route('admin.deleteProduct',$detail->id) }}"> <button class="btn btn-primary" onclick="return confirm('Are you sure?')"> <i class="fa fa-trash" aria-hidden="true" style="color:#fff" ></i></button></a>
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
