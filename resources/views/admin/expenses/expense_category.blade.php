@extends('admin.layouts.master')

@section('Current-Page')
Add Expenses Category 
@endsection

@section('Parent-Menu')
Expense
@endsection

@section('Menu')
Add Expenses Category
@endsection
  
@section('content')

    <div class="tile">
              {{-- <div class="row">
                <div class="col-lg-12">
                  <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ route('admin.viewExpense') }}'">View Expenses</button>
                </div>
              </div> --}}
              <br>
            <form action="{{ action('BillingController\ExpenseCategoryController@store') }}" method="post">
                {{ csrf_field() }}
              <div class="row ">
                <div class="col-lg-6">
                  <div class="form-group">
                      <label class="col-form-label col-form-label-lg" for="inputLarge">Select Date</label>
                      <input class="form-control" name="date" id="inputLarge" type="date" required>
                  </div>
                  </div>
                  <div class="col-lg-6">
                  <div class="form-group">
                      <label class="col-form-label col-form-label-lg " for="inputLarge">Enter Amount</label>
                      <input class="form-control" placeholder="Enter Amount" name="amount" id="inputLarge" type="number" required>
                  </div>
                </div>
              </div>
                  <div class="row ">
                     <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-form-label col-form-label-lg " for="inputLarge">Expense Type</label>
                        <input class="form-control" placeholder="Enter Expense Type" name="expense_type" id="inputLarge" type="text" required>
                    </div>
                  </div>
                <div class="col-lg-6">
                  <div class="form-group">
                      <label class="col-form-label col-form-label-lg" for="inputLarge">Description</label>
                      <textarea class="form-control" name="description" rows="3" column="3"></textarea>
                  </div>
                </div>
                </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="tile-footer">
                    <button class="btn btn-primary center-block" style="margin-left:62.8%" type="submit">Add Expense Category</button>
                  </div>
                </div>
              </div>
            </form>
      </div>

     {{--  // View Caregory --}}
    

      <div class="tile">
<div class="row">
        <div class="col-md-12">
                <table class="table table-bordered" id="VehicleTable">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Expense Type</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ExpenseCategories as $ExpenseCategory)
                            <tr>
                                <td>{{ $ExpenseCategory->date }}</td>
                                <td>{{ $ExpenseCategory->amount }}</td>
                                <td>{{ $ExpenseCategory->expense_type }}</td>
                                <td>{{ $ExpenseCategory->description }}</td>
                              <td>
                          <form action="{{ action('BillingController\ExpenseCategoryController@destroy',$ExpenseCategory->id) }}" method="POST">
                              {{ csrf_field() }}
                              <input type="hidden" name="_method" value="DELETE">
                              <a href="{{ action('BillingController\ExpenseCategoryController@edit',$ExpenseCategory->id) }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true" style="color:#fff"></i></a>
                              <button href="" onclick="return confirm('Are you sure?')" class="btn btn-primary"><i class="fa fa-trash-o"  aria-hidden="true" style="color:#fff" ></i></button>
                          </form>
                         </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
   