<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Salary;
use App\Employee;
use App\Attendence;

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
            'date'=>'required|unique:attendences',
        ]);
        try {
            $Attendence = new Attendence;
            $Attendence->date = request('date');
            $Attendence->save();
            foreach (request('employee')["name"] as $key=>$value) {
                $salary = new Salary;
                $salary->date_id = $Attendence->id;
                $salary->employees_id = request('employee')["name"][$key];
                $salary->attendence = request('employee')["attendence"][$key];
                $salary->save();
            }
            return redirect(action('BillingController\SalaryController@create'))->with('success','Salary Created Successfully');
        }catch (Exception $e){
            return back()->with('sorry','Sorry,Something went wrong!.Salary Cannot Be Created!');
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
         $Data['Employee'] = Employee::findorfail($id);
         $Data['Salaries'] = Salary::where('employees_id',$id)->get();
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
        $Data['Attendence'] = Attendence::findorfail($id);
        $Data['Salaries'] = Salary::where('date_id',$id)->pluck('attendence');
        $Data['Employees'] = Employee::get();
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
        $this->validate(request(),[
            'date'=>'required',
        ]);
        try {
            $Attendence = Attendence::findorfail($id);
            $Attendence->date = request('date');
            $Attendence->save();
            Salary::where('date_id',$id)->delete();
            foreach (request('employee')["name"] as $key=>$value) {
                $salary = new Salary;
                $salary->date_id = $Attendence->id;
                $salary->employees_id = request('employee')["name"][$key];
                $salary->attendence = request('employee')["attendence"][$key];
                $salary->save();
            }
            return redirect(action('BillingController\SalaryController@index'))->with('success','Salary Updated Successfully');
        }catch (Exception $e){
            return back()->with('sorry','Sorry,Something went wrong!.Salary Cannot Be Updated !');
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

    public function GetSalaryDetails()
    {
        $Data['Employee'] = Employee::findorfail(request('employee_id'));
        $Data['Attendence'] = Attendence::whereBetween('date', array(request('From_Date'), request('To_Date')))->first();
        $Data['salary'] = Salary::where([['employees_id',request('employee_id')],['date_id',$Data['Attendence']->id]])->get();
        return $Data;
    }
}
