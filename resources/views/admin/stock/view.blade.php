@extends('admin.billing.layouts.master')

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
            <button class="btn btn-primary" type="button" onclick="window.location.href='add_stock.php'">Add Deposit</button>
          </div>
        </div><br>
        <div class="row ">
          <div class="col-lg-2"></div>
          <div class="col-lg-10 col-xs-12">
              <div class="tile">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Product ID</th>
                      <th>Product Name (English)</th>
                      <th>Product Name (Tamil)</th>
                      <th>Date</th>
                      <th>Quantity</th>
                      <th>Cost Price</th>
                      <th>Selling Price</th>
                      <th>Enter Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Name</td>
                      <td>Name</td>
                      <td>12:02:2019</td>
                      <td>1</td>
                      <td>$125</td>
                      <td>$124</td>
                      <td>$1225</td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
    </div>
  @endsection