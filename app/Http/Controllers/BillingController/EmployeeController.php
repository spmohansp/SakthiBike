<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data['Employees'] = Employee::get();
        return view('admin.employee.view',$Data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.add');
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
            'name'=>'required',
            'mobile' => 'required',
        ]);
        try {
            // return request()->all();
            $Employee = new Employee;
            $Employee->name = request('name');  
            $Employee->mobile = request('mobile');
            $Employee->address = request('address');
            $Employee->amount_per_day = request('amount_per_day');
            $Employee->save();
            return redirect(action('BillingController\EmployeeController@create'))->with('success','Employee Created Successfully');
        }catch (\Exception $e){
            return back()->with('danger','Employee Cannot Be Created!');
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
        $Data['Employee'] = Employee::findorfail($id);
        return view('admin.employee.edit',$Data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       try {
            // return request()->all();
            $Employee = Employee::findorfail($id);
            $Employee->name = request('name');  
            $Employee->mobile = request('mobile');
            $Employee->employee_id = request('employee_id');
            $Employee->address = request('address');
            $Employee->amount_per_day = request('amount_per_day');
            $Employee->save();
            return redirect(action('BillingController\EmployeeController@create'))->with('success','Employee Updated Successfully');
        }catch (\Exception $e){
            return back()->with('sorry','Sorry,Something went wrong!.Manager Cannot Be Created!');
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
        Employee::findOrFail($id)->delete();
        return back()->with('success','Employee Details Deleted Successfully');
    }
}
