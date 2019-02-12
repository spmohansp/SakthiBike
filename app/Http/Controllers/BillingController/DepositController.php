<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepositController extends Controller
{

	public function addDeposit(){
   	return view('admin.billing.deposit.add_deposit');
     }


    public function viewDeposit(){
   	return view('admin.billing.deposit.view_deposit');
     }
}
