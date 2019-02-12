<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
{
    public function addExpense(){
    	return view('admin.billing.expenses.add_expenses');
    }

   public function viewExpense(){
   	return view('admin.billing.expenses.view_expenses');
   }
    
}
