<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\vehicle_type;
use App\Client;
use App\Products;


class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Data['Vehicles'] = vehicle_type::get();
        return view('admin.vehicle_type.add',$Data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate(request(),[
            'name' => 'required',
        ]);
        try {
            $VehicleName = new vehicle_type;
            $VehicleName->name = request('name');
            $VehicleName->save();
            return back()->with('success','Vehicle Name Created Successfully');
        }catch (\Exception $e){
            return back()->with('danger','Sorry,Something went wrong!.Vehicle Name Cannot be Stored!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Data['Vehicles'] = vehicle_type::findorfail($id);
        return view('admin.vehicle_type.edit',$Data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        try {
            // return request()->all();
            $VehicleName = vehicle_type::findorfail($id);
            $VehicleName->name = request('name');
            $VehicleName->save();
            return redirect(action('BillingController\VehicleTypeController@create'))->with('success','Vehicle Name Updated Successfully');
        }catch (\Exception $e){
            return back()->with('danger','Sorry,Something went wrong!.Vehicle Name Cannot Be Updated!');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       try{
            vehicle_type::findOrFail($id)->delete();
            return back()->with('success','Vehicle Deleted Successfully');
        }catch (\Exception $e){
            return back()->with('danger','Sorry,Something went wrong!.Vehicle Cannot Be Deleted!');
        }
    }

     public function GetVehicleName(){
        $Data['GetProducts'] = "";
        $Data['GetProduct'] = "";
        $Data['Client'] = Client::findorfail(request('Customer_Id'));
        $Data['vehicle_type'] = vehicle_type::findorfail($Data['Client']->Vehicle_id);
        $Data['GetProducts'] = collect(Products::where('Vehicle_id',$Data['Client']->Vehicle_id)->get());
        $Data['GetProduct'] = $Data['GetProducts']->merge(Products::where('Vehicle_id',"=",NULL)->get())->merge(Products::where('Vehicle_id',"=",'')->get());
        $Data['Products'] = $Data['GetProduct']->all();
        return $Data;
    }
}
