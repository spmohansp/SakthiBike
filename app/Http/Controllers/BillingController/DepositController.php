<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepositController extends Controller
{

	public function addDeposit(){
   	return view('admin.deposit.add_deposit');
     }


    public function viewDeposit(){
   	return view('admin.deposit.view_deposit');
     }
}
