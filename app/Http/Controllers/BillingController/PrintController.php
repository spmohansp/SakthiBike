<?php

namespace App\Http\Controllers\BillingController;
use App\Bill;
use App\BillProduct;
use App\Products;
use App\Client;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrintController extends Controller
{
	public function addPrint(){
	    $Products = Products::all();
	    $Clients = Client::all();
        $Employees = Employee::all();
		return view('admin.print.add_print',compact('Products','Clients','Employees'));
	}

	public function viewPrint(){
        $Bills = Bill::orderBy('id', 'DESC')->get();
		return view('admin.print.view_bills',compact('Bills'));
	}

    public function saveBill(){
        // return request()->all();
        $BillTotal=0;
        if(!empty(request('product_id'))){
            foreach (request('product_id') as $key => $product) {
                $BillTotal += request('total_amount')[$key];
            }
        }

        $Bill = new Bill;
        $LastBill = Bill::orderBy('id', 'DESC')->first();

        if (empty($LastBill)){
            $Bill->bill_number = 1;
        }else{
            $Bill->bill_number = $LastBill->bill_number+1;
        }
        $Bill->client_id = request('client_id');
        $Bill->date = request('date');
        $Bill->payment_status = request('payment_status');
        $Bill->paid_amount = request('paid_amount');
        $Bill->Due_Amount = $BillTotal - request('paid_amount');
        $Bill->bill_amount = $BillTotal;
        $Bill->balance_amount =$BillTotal - request('total_paid_amount') - request('discount_amount');
        $Bill->discount_amount = request('discount_amount');
        $Bill->save();
        if(!empty(request('product_id'))){
            foreach(request('product_id') as $key=> $product){
                $BillProduct = new BillProduct;
                $BillProduct->bill_id = $Bill->id;
                $BillProduct->product_id = $product;
                $BillProduct->quantity = request('qty')[$key];
                $BillProduct->Total_Cost = request('total_amount')[$key];
                $BillProduct->save();
            }
        }
        if(!empty(request('product_id'))){
            if(request('print')){
                return redirect(route('admin.printBill',$Bill->id));
            }else{
                return back()->with('success','Bill Added Successfully!');
            }
        }else{
            return back()->with('danger','Select Any Product First!');
        }
    }

    public function editPrint($id ,Request $request){
        $Products = Products::all();
        $Clients = Client::all();
        $Bill = Bill::findorfail($id);
        return view('admin.print.edit',compact('Products','Clients','Bill'));
    }


    public function UpdateBill($id){
        $BillTotal=0;
        foreach (request('product_id') as $key => $product) {
            $BillTotal += request('total_amount')[$key];
        }

        $Bill = Bill::findorfail($id);
        $Bill->client_id = request('client_id');
        $Bill->payment_type = request('payment_type');
        $Bill->date = request('date');
        $Bill->payment_status = request('payment_status');
        $Bill->paid_amount = request('paid_amount');
        $Bill->products = request('products');
        $Bill->bill_amount = $BillTotal;
        $Bill->balance_amount = $BillTotal - request('paid_amount');
        $Bill->save();

        foreach($Bill->BillProducts as $key=> $product){
            BillProduct::findorfail($product->id)->delete();
        }

        foreach(request('product_id') as $key=> $product){
            $BillProduct = new BillProduct;
            $BillProduct->bill_id = $Bill->id;
            $BillProduct->product_id = $product;
            $BillProduct->quantity = request('qty')[$key];
            $BillProduct->CGST = request('CGST')[$key];
            $BillProduct->SGST = request('SGST')[$key];
            $BillProduct->CESS = request('CESS')[$key];
            $BillProduct->Total_Cost = request('total_amount')[$key];
            $BillProduct->save();
        }
        return back()->with('success','Bill Added Successfully!');
    }

    public function  printBill($id){
        $Bill = Bill::findorfail($id);
	    return view('admin.print.print_bill',compact('Bill'));
    }



    public function search_customer_name()
    {
        return Client::all();
    }


}
