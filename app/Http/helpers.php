<?php

use App\Salary;
use App\Employee;
use App\ExtraWork;
use App\Attendence;

if (! function_exists('GetExtraWorkDetails')) {
    function GetExtraWorkDetails($ExtraworkId)
    {
        return $Data['ExtraWorks'] = ExtraWork::findorfail($ExtraworkId);
    }
}

if (! function_exists('GetSalaryDetails')) {
    function GetSalaryDetails($EmployeeId,$Month,$Year)
    {
    	$Data[] = '';
    	$Data['Employee'] = Employee::findorfail($EmployeeId);
    	$Data['Attendence'] = Attendence::whereMonth('date',$Month)->whereYear('date',$Year)->first();
        $Salaries = Salary::where([['employees_id',$EmployeeId],['date_id',$Data['Attendence']->id]])->get();
        $Count = 0;
        foreach ($Salaries as $key=>$salary) {
        	if($salary->attendence!=0){
        		$Data['AttendenceCount'] = ++$Count;
        	}
        }
        return $Data;
    }
}
