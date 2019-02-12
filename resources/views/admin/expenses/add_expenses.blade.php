@extends('admin.layouts.master')

@section('Current-Page')
Add Expenses 
@endsection

@section('Parent-Menu')
Transactions
@endsection

@section('Menu')
Add Expenses
@endsection
  
@section('content')

    <div class="tile">
        <div class="pad">
          <div class="row section-gap">
            <div class="col-lg-7">

            </div>
            <div class="col-lg-2">
              <button class="btn btn-primary" type="button" onclick="window.location.href='view_expenses.php'">View Expenses</button>
            </div>
          </div><br>
          <div class="row ">
            <div class="col-lg-2 "></div>
            <div class="col-lg-3 col-xs-4 w3-center">
              <div class="form-group">
                  <label class="col-form-label col-form-label-lg" for="inputLarge">Select Date</label>
                  <input class="form-control form-control" id="inputLarge" type="date">
              </div>

              <div class="form-group">
                  <label class="col-form-label col-form-label-lg " for="inputLarge">Enter Amount</label>
                  <input class="form-control form-control" id="inputLarge" type="number">
              </div>
            </div>
            <div class="col-lg-4 col-xs-4 w3-center">
              <div class="form-group">
                  <label class="col-form-label col-form-label-lg" for="inputLarge">Description</label>
                  <textarea class="form-control" id="exampleTextarea" rows="6"></textarea>
              </div>

            </div>
            <div class="col-lg-3"></div>
          </div>
          <div class="row">
            <div class="col-lg-2">

            </div>
            <div class="col-lg-10">
              <div class="tile-footer">
                <button class="btn btn-primary" style="margin-left:62.8%" type="submit" >Submit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    
@endsection
   
