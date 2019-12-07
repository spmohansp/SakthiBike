@extends('admin.layouts.master')

@section('Current-Page')
Add Expenses 
@endsection

@section('Parent-Menu')
Expense
@endsection

@section('Menu')
Add Expenses
@endsection
  
@section('content')

    <div class="tile">
        <div class="pad">
              <div class="row">
                <div class="col-lg-7">
                </div>
                <div class="col-lg-2">
                  <button class="btn btn-primary" type="button" onclick="window.location.href='{{ route('admin.viewExpense') }}'">View Expenses</button>
                </div>
              </div><br>
            <form action="{{ route('admin.saveExpense') }}" method="post">
                {{ csrf_field() }}
              <div class="row ">
                <div class="col-lg-2 "></div>
                <div class="col-lg-3 col-xs-4 w3-center">
                  <div class="form-group">
                      <label class="col-form-label col-form-label-lg" for="inputLarge">Select Date</label>
                      <input class="form-control" name="date" id="inputLarge" type="date" required>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label col-form-label-lg " for="inputLarge">Enter Amount</label>
                      <input class="form-control" name="amount" id="inputLarge" type="number" required>
                  </div>
                    <div class="form-group">
                        <label class="col-form-label col-form-label-lg " for="inputLarge">Select Expense Type</label>
                        <select name="expense_id" id="" class="form-control" required>
                            <option value="">Select Expense</option>
                          @foreach($Expense_Categories as $Expense_Category)
                            <option value={{ $Expense_Category->id }}>{{ $Expense_Category->expense_type}} </option>
                          @endforeach 
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-4 w3-center">
                  <div class="form-group">
                      <label class="col-form-label col-form-label-lg" for="inputLarge">Description</label>
                      <textarea class="form-control" name="description" rows="10"></textarea>
                  </div>
                </div>
                <div class="col-lg-3"></div>
              </div>
              <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-10">
                  <div class="tile-footer">
                    <button class="btn btn-primary" style="margin-left:62.8%" type="submit">Add Expense</button>
                  </div>
                </div>
              </div>
            </form>
        </div>
      </div>
    
@endsection
   
