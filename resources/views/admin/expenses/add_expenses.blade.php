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
      <div class="row">
        <div class="col-lg-12">
          <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ route('admin.viewExpense') }}'">View Expenses</button>
        </div>
      </div>
      <br>
      <form action="{{ route('admin.saveExpense') }}" method="post">
        {{ csrf_field() }}
        <div class="row ">
          <div class="col-lg-4 col-xs-4 w3-center">
            <div class="form-group">
              <label class="col-form-label col-form-label-lg" for="inputLarge">Select Date</label>
              <input class="form-control" name="date" id="inputLarge" type="date" required>
            </div>
          </div>

          <div class="col-lg-4 col-xs-4 w3-center">
            <div class="form-group">
              <label class="col-form-label col-form-label-lg " for="inputLarge">Select Expense Type</label>
              <select name="expense_id" class="form-control SelectExpense" required>
                <option value="">Select Expense</option>
                @foreach($Expense_Categories as $Expense_Category)
                <option value={{ $Expense_Category->id }}>{{ $Expense_Category->expense_type}} </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-lg-4 col-xs-4 w3-center EmployeeId_Div">
            <div class="form-group">
              <label class="col-form-label col-form-label-lg " for="inputLarge">Select Employee </label>
              <select name="employee_id" id="" class="form-control Employee" required>
                <option value="">Select Employee</option>
                @foreach($Employees as $Employee)
                <option value={{ $Employee->id }}>{{ $Employee->name}} </option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="row ">
          <div class="col-lg-6 col-xs-4 w3-center">
            <div class="form-group">
              <label class="col-form-label col-form-label-lg " for="inputLarge">Enter Amount</label>
              <input class="form-control" name="amount" placeholder="Enter Amount" id="inputLarge" type="number" required>
            </div>
          </div>
          <div class="col-lg-6 col-xs-4 w3-center">
            <div class="form-group">
              <label class="col-form-label col-form-label-lg" for="inputLarge">Description</label>
              <textarea class="form-control" placeholder="Enter Description" name="description" rows="3"></textarea>
            </div>
          </div>
        </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="tile-footer">
            <button class="btn btn-primary" style="margin-left:62.8%" type="submit">Add Expense</button>
          </div>
        </div>
      </div>
    </form>
    </div>
@endsection
@section('loadMore')
    <script>
        $('.EmployeeId_Div').hide();  
        $(document).ready(function(){
            $('.SelectExpense').on('change',function(){
              ExpenseData();
            });
        });

        function ExpenseData(){
          var ExpenseId = $( ".SelectExpense" ).val();
          $.ajax({
          type: 'get',
          url: '{{ action('BillingController\ExpenseController@GetExpenseDetails') }}',
          data: { ExpenseId: ExpenseId},
          success: function (data) {
            if(data!=''){
              if(ExpenseId == '1'){
                $('.EmployeeId_Div').show();
                $('.Employee').prop("disabled", false);
              }else{
                $('.EmployeeId_Div').hide();
                $('.Employee').prop("disabled", true);
              }
            }else{
              $('.EmployeeId_Div').hide();
            }
          }
      });
    }
    </script>
@endsection
