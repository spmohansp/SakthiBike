<?php

namespace App\Http\Controllers\BillingController;

use App\Expense;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ExpenseCategory;


class ExpenseController extends Controller
{
    public function addExpense(){
        $Data['Expense_Categories'] = ExpenseCategory::get();
        $Data['Employees'] = Employee::get();
    	return view('admin.expenses.add_expenses',$Data);
    }

    public function viewExpense(){
        $Expenses = Expense::orderBy('date', 'desc')->get();
	    return view('admin.expenses.view_expenses',compact('Expenses'));
    }

    public function saveExpense(){
        try {
            $Expense = new Expense;
            $Expense->date = request('date');
            $Expense->amount = request('amount');
            $Expense->expense_type_id = request('expense_id');
            $Expense->employee_id = request('employee_id');
            $Expense->description = request('description');
            $Expense->save();
            return back()->with('success','Expense Added Successfully!');
        }catch (\Exception $e){
            return back()->with('danger','Sorry,Something went wrong!.Expense Cannot be Stored!');
        }
    }

    public function editExpense($id){
        try {
            $Data['Expense_Categories'] = ExpenseCategory::get();
            $Data['Employees'] = Employee::get();
            $Data['Expense'] = Expense::findorfail($id);
            return view('admin.expenses.edit',$Data);
        }catch (\Exception $e){
            return back()->with('danger','Sorry,Something went wrong!.Expense Cannot be Edited!');
        }
    }

    public function updateExpense($id){
        try {
            $Expense = Expense::findorfail($id);
            $Expense->date = request('date');
            $Expense->amount = request('amount');
            $Expense->expense_type_id = request('expense_id');
            $Expense->description = request('description');
            $Expense->save();
            return redirect(route('admin.viewExpense'))->with('success','Expense Updated Successfully!');
        }catch (\Exception $e){
            return back()->with('danger','Sorry,Something went wrong!.Expense Cannot be Updated!');
        }
    }

    public function deleteExpense($id){
        try{
            Expense::findorfail($id)->delete();
            return back()->with('success','Expense Deleted Successfully!');
        }catch (\Exception $e){
            return back()->with('danger','Sorry,Something went wrong!.Expense Cannot be Deleted!');
        }
    }
    
    public function GetExpenseDetails(){
        if(!empty(request('ExpenseId'))){
           return ExpenseCategory::findorfail(request('ExpenseId'));
        }else{
            return '';
        }
    }
}
