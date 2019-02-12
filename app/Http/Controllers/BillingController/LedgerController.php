<?php

namespace App\Http\Controllers\BillingController;
use App\Ledger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LedgerController extends Controller
{	
	

    public function viewLedger(){
	    $Ledger	= Ledger::all();
	    return view('admin.billing.ledger.ledger',compact('Ledger'));
    }

    public function addLedger(Request $request){
	    $request->validate([
	    	'name'=>'required',
	    ]);
	    try{
		    $Ledger = new Ledger;
		    $Ledger->name = request('name');
		    $Ledger->save();
		    return back()->with('success','Ledger Added Successfully');
	    }catch(Exception $e){
	    	return back()->with('danger','Something went wrong!!!');
	    }
    }

    public function editLedger($id){
	    $Ledger =Ledger::FindorFail($id);
	    return view('admin.billing.ledger.edit_ledger',compact('Ledger'));
    }

    public function updateLedger($id){
    	try{
		    $Ledger =Ledger::FindorFail($id);
		   	$Ledger->name = request('name');
		    $Ledger->save();
		    return back()->with('success','Updated Added Successfully');
		}catch(Exception $e){
			return back()->with('danger','Something went wrong!!!');
		}
    }
   
   public function deleteLedger($id){
	    $Ledger =Ledger::FindorFail($id);
	    $Ledger->delete();
	    return back()->with('success','Ledger Deleted Successfully');
    }
}
