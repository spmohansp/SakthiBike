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
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <a href=""><button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true" style="color:#fff"></i></button></a>
                          <a href=""> <button class="btn btn-primary" onclick="return confirm('Are you sure?')"> <i class="fa fa-trash" aria-hidden="true" style="color:#fff" ></i></button></a>
                        </td>
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
