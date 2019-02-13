<?php

namespace App\Http\Controllers\BillingController;
use App\Products;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrintController extends Controller
{
	public function addPrint(){
	    $Products = Products::all();
	    $Clients = Client::all();
		return view('admin.print.add_print',compact('Products','Clients'));
	}

	public function viewPrint(){
		return view('admin.print.view_print');
	}
}
