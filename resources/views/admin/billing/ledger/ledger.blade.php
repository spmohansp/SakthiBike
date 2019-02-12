@extends('admin.billing.layouts.master')

@section('Current-Page')
Ledger
@endsection

@section('Parent-Menu')
Transactions
@endsection

@section('Menu')
Ledger
@endsection

@section('content')
    <div class="app-title">
        <div>
          <h1><i class="fa fa-user" style="color:#663ab7"></i>  &nbsp Ledger </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg" ></i></li>
          <li class="breadcrumb-item"><a href="add_deposit.php">Add Deposit</a></li>
        </ul>
    </div>
    <div class="tile">
      <div class="pad">
        <div class="row section-gap">
          <div class="col-lg-2 col-xs-1"></div>
          <div class="col-lg-3 col-xs-4 ">
            <div class="form-group">
                <label class="col-form-label col-form-label-lg" for="inputLarge">Enter Name</label>
                <input class="form-control form-control-lg" id="inputLarge" type="text">
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" >Submit</button>
            </div>
          </div>
          <div class="col-lg-7"></div>
        </div>
        <div class="row section-gap">
          <div class="col-lg-2">

          </div>
          <div class="col-lg-4 col-xs-12">
              <div class="tile">
                <table class="table">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Name</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Mark</td>

                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Jacob</td>

                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Larry</td>

                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
    </div>
  @endsection