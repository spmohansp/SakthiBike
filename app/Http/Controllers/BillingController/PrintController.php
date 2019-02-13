<?php

namespace App\Http\Controllers\BillingController;
use App\Bill;
use App\BillProduct;
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
        $Bills = Bill::orderBy('id', 'DESC')->get();
		return view('admin.print.view_bills',compact('Bills'));
	}

    public function saveBill(){
//	    return request()->all();
        $Bill = new Bill;
        $LastBill = Bill::orderBy('id', 'DESC')->first();

        if (empty($LastBill)){
            $Bill->bill_number = 1;
        }else{
            $Bill->bill_number = $LastBill->bill_number+1;
        }
        $Bill->client_id = request('client_id');
        $Bill->payment_type = request('payment_type');
        $Bill->date = request('date');
        $Bill->payment_status = request('payment_status');
        $Bill->paid_amount = request('paid_amount');
        $Bill->products = request('products');
        $Bill->balance_amount = request('balance_amount');
        $Bill->save();

        foreach(request('product_id') as $key=> $product){
            $BillProduct = new BillProduct;
            $BillProduct->product_id = $product;
            $BillProduct->quantity = request('qty')[$key];
            $BillProduct->bill_id = $Bill->id;
            $BillProduct->save();
        }
        return back()->with('success','Bill Added Successfully!');
    }
}
