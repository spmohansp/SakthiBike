@extends('admin.billing.layouts.master')

@section('Current-Page')
Add Stock
@endsection

@section('Parent-Menu')
Transactions
@endsection

@section('Menu')
Add Stock
@endsection

@section('content')
    <div class="tile">
      <div class="pad">
        <div class="row section-gap">
          <div class="col-lg-8">

          </div>
          <div class="col-lg-4">
            <button class="btn btn-primary" type="button" onclick="window.location.href='view_deposit.php'">View Deposit</button>
          </div>
        </div><br>
        <div class="row">
          <div class="col-lg-2 "></div>
          <div class="col-lg-4 col-xs-4 w3-center">
            <div class="form-group">
                <label class="col-form-label col-form-label-lg" for="inputLarge">Product ID</label>
                <input class="form-control form-control" id="inputLarge" type="text">
            </div>

          </div>
          <div class="col-lg-4 col-xs-4 w3-center">
            <div class="form-group">
              <label class="col-form-label col-form-label-lg " for="inputLarge">Date</label>
              <input class="form-control form-control" id="inputLarge" type="date">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-2 "></div>
          <div class="col-lg-4 col-xs-4 w3-center">
            <div class="form-group">
                <label class="col-form-label col-form-label-lg " for="inputLarge">Product Name (English)</label>
                <input class="form-control form-control" id="inputLarge" type="text">
            </div>
          </div>
          <div class="col-lg-4 col-xs-4 w3-center">
            <div class="form-group">
                <label class="col-form-label col-form-label-lg " for="inputLarge">Product Name (Tamil)</label>
                <input class="form-control form-control" id="inputLarge" type="text">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-4 col-xs-4 w3-center">
            <div class="form-group">
                <label class="col-form-label col-form-label-lg " for="inputLarge">Cost Price</label>
                <input class="form-control form-control" id="inputLarge" type="number">
            </div>
          </div>

          <div class="col-lg-4 col-xs-4 w3-center">
            <div class="form-group">
                <label class="col-form-label col-form-label-lg" for="inputLarge">Selling Price</label>
                <input class="form-control form-control" id="inputLarge" type="number">
            </div>

          </div>
        </div>
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-4 col-xs-4 w3-center">
            <div class="form-group">
                <label class="col-form-label col-form-label-lg " for="inputLarge">Quantity</label>
                <input class="form-control form-control" id="inputLarge" type="number">
            </div>
          </div>
          <div class="col-lg-4 col-xs-4 w3-center">
            <div class="form-group">
                <label class="col-form-label col-form-label-lg" for="inputLarge">Enter Amount</label>
                <input class="form-control form-control" id="inputLarge" type="number">
            </div>

          </div>
          <div class="col-lg-7"></div>
        </div>
        <div class="row">
          <div class="col-lg-2">

          </div>
          <div class="col-lg-10">
            <div class="tile-footer">
              <button class="btn btn-primary"style="margin-left:62.8%" type="submit" >Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection