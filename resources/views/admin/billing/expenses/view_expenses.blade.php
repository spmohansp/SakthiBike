@extends('admin.billing.layouts.master')

@section('Current-Page')
View Expenses
@endsection

@section('Parent-Menu')
Transactions
@endsection

@section('Menu')
View Expenses
@endsection

@section('content')
     
    <div class="tile">
      <div class="pad">
        <div class="row section-gap">
          <div class="col-lg-10">

          </div>
          <div class="col-lg-2">
            <button class="btn btn-primary" type="button" onclick="window.location.href='add_expenses.php'">Add Expenses</button>
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
                      <th>Date</th>
                      <th>Amount</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>12.01.2019</td>
                      <td>$121</td>
                      <td>Lorem Ipsum is simply dummy text of the printing </td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
    </div>
 @endsection