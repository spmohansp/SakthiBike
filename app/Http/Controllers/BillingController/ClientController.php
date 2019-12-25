<?php

namespace App\Http\Controllers\BillingController;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\vehicle_type;

class ClientController extends Controller
{
    public function addClient(){
        $Data['Vehicles'] = vehicle_type::get();
    	return view('admin.client.add_clients',$Data);
    }

    public function saveClient(Request $request){
    	$request->validate([
    		'name'=>'required',
    		'phone_number'=>'required|min:10|max:10|unique:clients',
    	]);
    	try{
	    	$Client = new Client;
	    	$Client->name = request('name');
	    	$Client->phone_number = request('phone_number');
	    	$Client->bike_no = request('bike_no');
	    	$Client->service_km = request('service_km');
            $Client->Vehicle_id = request('Vehicle_id');
            $Client->bike_name = request('bike_name');
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
        $Vehicles = vehicle_type::get();
    	return view('admin.client.edit_clients',compact('Client','Vehicles'));
    }

    public function updateClient($id,Request $request){
        $request->validate([
			'name' => 'required',
			'phone_number' => 'required|min:10|max:10',
        ]);
	    try{
	    	$Client = Client::FindorFail($id);
	    	$Client->name = request('name');
            $Client->phone_number = request('phone_number');
            $Client->bike_no = request('bike_no');
            $Client->Vehicle_id = request('Vehicle_id');
            $Client->service_km = request('service_km');
            $Client->bike_name = request('bike_name');
	    	$Client->save();
	    	return redirect(url('/admin/clients'))->with('success','Client Updated Successfully');
    	}catch(Exception $e){
    		return back()->with('danger','Something went wrong');
    	}
    }

    public function deleteClient($id){
    	try{
	    	Client::FindorFail($id)->delete();
	    	return back()->with('success','Client Deleted Successfully');
    	}catch(\Exception $e){
    		return back()->with('danger','Something went wrong.Customer Cannot Be Delete.Because This Customer Added to the Bill.');
    	}
    }
}
