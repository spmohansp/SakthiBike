@extends('admin.layouts.master')

@section('Current-Page')
Update Expenses Category 
@endsection

@section('Parent-Menu')
Expense
@endsection

@section('Menu')
Update Expenses Category
@endsection
  
@section('content')


<div class="tile">
  <div class="row">
                <div class="col-lg-12">
                  <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ action('BillingController\ExpenseCategoryController@create') }}'">View Expense Category</button>
                </div>
              </div>
            <br>
             <form action="{{ action('BillingController\ExpenseCategoryController@update',$ExpenseCategory->id) }}" method="post">
                {{ csrf_field() }}
                {{method_field('PATCH')}}
                <div class="row ">
                 <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-form-label col-form-label-lg " for="inputLarge">Expense Type</label>
                        <input class="form-control" placeholder="Enter Expense Type" value="{{ $ExpenseCategory->expense_type }}" name="expense_type" id="inputLarge" type="text" >
                    </div>
                  </div>
                </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="tile-footer">
                    <button class="btn btn-primary center-block" type="submit">Update Expense Category</button>
                  </div>
                </div>
              </div>
            </form>
      </div>

@endsection