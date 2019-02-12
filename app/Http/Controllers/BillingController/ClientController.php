<?php

namespace App\Http\Controllers\BillingController;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function addClient(){
    	return view('admin.client.add_clients');
    }

    public function saveClient(Request $request){
    	$request->validate([
    		'name'=>'required',
    		'business_name'=>'required',
    		'email'=>'required|email|unique:clients',
    		'phone_no'=>'required|min:10|max:10|unique:clients',
    		'address'=>'required',
    	]);
    	try{
	    	$Client = new Client;
	    	$Client->name = request('name');
	    	$Client->business_name = request('business_name');
	    	$Client->email = request('email');
	    	$Client->phone_no = request('phone_no');
	    	$Client->address = request('address');
	    	$Client->gst = request('gst');
	    	$Client->notes = request('notes');
	    	$Client->save();
	    	return back()->with('success','Client Added Successfully');
    	}catch(Exception $e){
    		return back()->with('danger','Something went wrong');
    	}
    	
    }


    public function viewClient(){
    	$Clients = Client::all();
    	return view('admin.client.view_clients',compact('Clients'));
    }

    public function editClient($id){
    	$Client = Client::FindorFail($id);
    	return view('admin.client.edit_clients',compact('Client'));
    }

    public function updateClient($id,Request $request){
        $request->validate([
            'name'=>'required',
            'business_name'=>'required',
            'email'=>'required|email',
            'phone_no'=>'required|min:10|max:10',
            'address'=>'required',
        ]);
	    try{
	    	$Client = Client::FindorFail($id);
	    	$Client->name = request('name');
	    	$Client->business_name = request('business_name');
	    	$Client->email = request('email');
	    	$Client->phone_no = request('phone_no');
	    	$Client->address = request('address');
	    	$Client->gst = request('gst');
	    	$Client->notes = request('notes');
	    	$Client->save();
	    	return back()->with('success','Client Updated Successfully');
    	}catch(Exception $e){
    		return back()->with('danger','Something went wrong');
    	}
    }

    public function deleteClient($id){
    	try{
	    	Client::FindorFail($id)->delete();
	    	return back()->with('success','Client Deleted Successfully');
    	}catch(Exception $e){
    		return back()->with('danger','Something went wrong');
    	}
    }
}
