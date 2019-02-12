<?php

namespace App\Http\Controllers\BillingController;
use App\Ledger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LedgerController extends Controller
{	

    public function viewLedger(){
	    $Ledgers = Ledger::all();
	    return view('admin.ledger.ledger',compact('Ledgers'));
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
	    return view('admin.ledger.edit_ledger',compact('Ledger'));
    }

    public function updateLedger($id){
    	try{
		    $Ledger =Ledger::FindorFail($id);
		   	$Ledger->name = request('name');
		    $Ledger->save();
		    return back()->with('success','Ledger Updated Successfully');
		}catch(Exception $e){
			return back()->with('danger','Something went wrong!!!');
		}
    }
   
   public function deleteLedger($id){
	    Ledger::FindorFail($id)->delete();
	    return back()->with('success','Ledger Deleted Successfully');
    }
}
