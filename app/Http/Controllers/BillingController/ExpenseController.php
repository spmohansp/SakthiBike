<?php

namespace App\Http\Controllers\BillingController;

use App\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
{
    public function addExpense(){
    	return view('admin.expenses.add_expenses');
    }

    public function viewExpense(){
        $Expenses = Expense::orderBy('date', 'desc')->get();
	    return view('admin.expenses.view_expenses',compact('Expenses'));
    }

    public function saveExpense(){
        $Expense = new Expense;
        $Expense->date = request('date');
        $Expense->amount = request('amount');
        $Expense->expense_id = request('expense_id');
        $Expense->description = request('description');
        $Expense->save();
        return back()->with('success','Expense Added Successfully!');
    }

    public function editExpense($id){
        $Expense = Expense::findorfail($id);
        return view('admin.expenses.edit',compact('Expense','Legers'));
    }

    public function updateExpense($id){
        $Expense = Expense::findorfail($id);
        $Expense->date = request('date');
        $Expense->amount = request('amount');
        $Expense->expense_id = request('expense_id');
        $Expense->description = request('description');
        $Expense->save();
        return back()->with('success','Expense Updated Successfully!');
    }

    public function deleteExpense($id){
        Expense::findorfail($id)->delete();
        return back()->with('success','Expense Deleted Successfully!');
    }
}
