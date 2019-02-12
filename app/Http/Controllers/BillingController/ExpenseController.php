<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
{
    public function addExpense(){
    	return view('admin.expenses.add_expenses');
    }

   public function viewExpense(){
        return view('admin.expenses.view_expenses');
   }
    
}
