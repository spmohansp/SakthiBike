<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Salary;
use App\Employee;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data['Employees'] = Employee::get();
        $Data['Salaries'] = Salary::get();
        return view('admin.salary.view',$Data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Data['Employees'] = Employee::get();
        return view('admin.salary.add',$Data);
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
            'from_date'=>'required',
        ]);
        try {
            // return request()->all();
            $salary = new Salary;
            $salary->name = request('name');  
            $salary->from_date = request('from_date');
            $salary->to_date = request('to_date');
            $salary->amount_per_day = request('amount_per_day');
            $salary->save();
            return redirect(action('BillingController\SalaryController@create'))->with('success','Salary Created Successfully');
        }catch (Exception $e){
            return back()->with('sorry','Sorry,Something went wrong!.Manager Cannot Be Created!');
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
         $Data['Salary'] = Salary::get();
         $Data['Employees'] = Employee::get();
         return view('admin.salary.employeewise_salary_view',$Data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Data['Employees'] = Employee::get();
        $Data['Salary'] = Salary::findorfail($id);
        return view('admin.salary.edit',$Data);
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
            $salary = Salary::findorfail($id);
            $salary->name = request('name');  
            $salary->from_date = request('from_date');
            $salary->to_date = request('to_date');
            $salary->amount_per_day = request('amount_per_day');
            $salary->save();
            return redirect(action('BillingController\SalaryController@create'))->with('success','Salary Updated Successfully');
        }catch (Exception $e){
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
        Salary::findOrFail($id)->delete();
        return back()->with('success','Salary Details Deleted Successfully');
    }
}
