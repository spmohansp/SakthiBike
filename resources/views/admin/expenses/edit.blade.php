@extends('admin.layouts.master')

@section('Current-Page')
Edit Expenses
@endsection

@section('Parent-Menu')
Expense
@endsection

@section('Menu')
Edit Expenses
@endsection

@section('content')

<div class="tile">
    <div class="pad">
        <form action="{{ route('admin.updateExpense',$Expense->id) }}" method="post">
            {{ csrf_field() }}
            <div class="row ">
                <div class="col-lg-2 "></div>
                <div class="col-lg-3 col-xs-4 w3-center">
                    <div class="form-group">
                        <label class="col-form-label col-form-label-lg" for="inputLarge">Select Date</label>
                        <input class="form-control" name="date" value="{{ $Expense->date }}" id="inputLarge" type="date" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label col-form-label-lg " for="inputLarge">Enter Amount</label>
                        <input class="form-control" name="amount" id="inputLarge" value="{{ $Expense->amount }}"  type="number" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label col-form-label-lg " for="inputLarge">Ledger Type</label>
                        <select name="expense_id" id="" class="form-control" required>
                            <option value="">Select Expense</option>
                            @foreach($Legers as $Leger)
                            <option value="{{ $Leger->id }}" {{ ($Leger->id == $Expense->expense_id)?'selected':'' }}>{{ $Leger->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-4 w3-center">
                    <div class="form-group">
                        <label class="col-form-label col-form-label-lg" for="inputLarge">Description</label>
                        <textarea class="form-control" name="description" rows="10">{{ $Expense->description }}</textarea>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
            <div class="row">
                <div class="col-lg-2">

                </div>
                <div class="col-lg-10">
                    <div class="tile-footer">
                        <button class="btn btn-primary" style="margin-left:62.8%" type="submit">update Expense</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
   
