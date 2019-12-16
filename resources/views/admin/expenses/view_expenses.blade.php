@extends('admin.layouts.master')

@section('Current-Page')
View Expenses
@endsection

@section('Parent-Menu')
Expense
@endsection

@section('Menu')
View Expenses
@endsection

@section('content')
     
    <div class="tile">
      <div class="pad">
        <div class="row">
          <div class="col-lg-10">

          </div>
          <div class="col-lg-2">
            <button class="btn btn-primary" type="button" onclick="window.location.href='{{ route('admin.addExpense') }}'">Add Expenses</button>
          </div>
        </div><br>
        <div class="row ">
          <div class="col-lg-12 col-xs-12">
              <div class="tile">
                 <div class="tile-body table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Expense</th>
                      <th>Date</th>
                      <th>Amount</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($Expenses as $key=>$Expense)
                    <tr>
                      <td>{{ ++$key }}</td>
                      <td>{{ @$Expense->EmployeeName ? $Expense->ExpenseCategory->expense_type.'-'.@$Expense->EmployeeName->name :$Expense->ExpenseCategory->expense_type }}</td>
                      <td>{{ date('d-m-Y',strtotime($Expense->date)) }}</td>
                      <td>{{ $Expense->amount }}</td>
                      <td>{{ $Expense->description }}</td>
                      <td>
                        <a href="{{ route('admin.editExpense',$Expense->id) }}"><button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true" style="color:#fff"></i></button></a>
                        <a href="{{ route('admin.deleteExpense',$Expense->id) }}"> <button class="btn btn-primary" onclick="return confirm('Are you sure?')"> <i class="fa fa-trash" aria-hidden="true" style="color:#fff" ></i></button></a>
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