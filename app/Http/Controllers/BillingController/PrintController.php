<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrintController extends Controller
{
	public function addPrint(){
		return view('admin.print.add_print');
	}

	public function viewPrint(){
		return view('admin.print.view_print');
	}
}
