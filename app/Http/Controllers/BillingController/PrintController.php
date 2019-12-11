<?php

namespace App\Http\Controllers\BillingController;
use App\Bill;
use App\BillProduct;
use App\Products;
use App\Client;
use App\Employee;
use App\ExtraWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrintController extends Controller
{
	public function addPrint(){
	    $Products = Products::all();
	    $Clients = Client::all();
        $Employees = Employee::all();
        $ExtraWorks = ExtraWork::all();
		return view('admin.print.add_print',compact('Products','Clients','Employees','ExtraWorks'));
	}

	public function viewPrint(){
        $Bills = Bill::orderBy('id', 'DESC')->get();
		return view('admin.print.view_bills',compact('Bills'));
	}

    public function saveBill(){
        // return request()->all();
        $BillTotal=0;
        $TotalBill=0;
        if(!empty(request('product_id'))){
            foreach (request('product_id') as $key => $product) {
                $BillTotal += request('total_amount')[$key];
            }
        }

        if(!empty(request('extraAmount'))){
            foreach (request('extraAmount') as $key1 => $extraAmount) {
                $ExtraWorks = ExtraWork::findorfail(request('extraAmount')[$key1]);
                $TotalBill += $ExtraWorks->amount;
            }
        }

        $bill_amount = $BillTotal + $TotalBill;

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
        $Bill->paid_amount = request('bill_amount_given');
        $Bill->bill_amount_given = request('bill_amount_given');
        $Bill->bill_amount = $bill_amount;
        $Bill->balance_amount =$bill_amount - request('bill_amount_given') - request('discount_amount');
        $Bill->discount_amount = request('discount_amount');
        $Bill->employee_id = json_encode(request('employees'));
        $Bill->extra_work_id = json_encode(request('extraAmount'));
        $Bill->amount = request('amount');
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
        $Data['Products']   = Products::all();
        $Data['Clients']    = Client::all();
        $Data['ExtraWorks'] = ExtraWork::all();
        $Data['Employees'] = Employee::all();
        $Data['Bill']       = Bill::findorfail($id);
        return view('admin.print.edit',$Data);
    }


    public function UpdateBill($id){
        $BillTotal=0;
        $TotalBill=0;
        if(!empty(request('product_id'))){
            foreach (request('product_id') as $key => $product) {
                $BillTotal += request('total_amount')[$key];
            }
        }

        if(!empty(request('extraAmount'))){
            foreach (request('extraAmount') as $key1 => $extraAmount) {
                $ExtraWorks = ExtraWork::findorfail(request('extraAmount')[$key1]);
                $TotalBill += $ExtraWorks->amount;
            }
        }

        $bill_amount = $BillTotal + $TotalBill;
        // return request('bill_amount_given');
        $Bill = Bill::findorfail($id);
        $Bill->client_id = request('client_id');
        $Bill->date = request('date');
        $Bill->payment_status = request('payment_status');
        $Bill->paid_amount = request('bill_amount_given');
        $Bill->bill_amount_given = request('bill_amount_given') ;
        $Bill->bill_amount = $bill_amount;
        $Bill->balance_amount =$bill_amount - request('bill_amount_given') - request('discount_amount');
        $Bill->discount_amount = request('discount_amount');
        $Bill->employee_id = json_encode(request('employees'));
        $Bill->extra_work_id = json_encode(request('extraAmount'));
        $Bill->save();

        foreach($Bill->BillProducts as $key=> $product){
            BillProduct::findorfail($product->id)->delete();
        }

        foreach(request('product_id') as $key=> $product){
            $BillProduct = new BillProduct;
            $BillProduct->bill_id = $Bill->id;
            $BillProduct->product_id = $product;
            $BillProduct->quantity = request('qty')[$key];
            $BillProduct->Total_Cost = request('total_amount')[$key];
            $BillProduct->save();
        }
        if(!empty(request('product_id'))){
            if(request('print')){
                return redirect(route('admin.printBill',$Bill->id));
            }else{
                return back()->with('success','Bill Updated Successfully!');
            }
        }else{
            return back()->with('danger','Select Any Product First!');
        }
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
