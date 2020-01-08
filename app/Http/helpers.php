<?php

use App\Salary;
use App\Employee;
use App\Expense;
use App\ExtraWork;
use App\Bill;
use App\ExtraIncome;
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
        $Data['Expense'] = Expense::where('employee_id',$EmployeeId)->whereMonth('date',$Month)->whereYear('date',$Year)->sum('amount');
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


if (! function_exists('DashboardMonthlyWiseTotalIncomeExpense')) {
    function DashboardMonthlyWiseTotalIncomeExpense($Month,$Year) {
        $Data['Income'] = Bill::whereYear('date', '=', $Year)->whereMonth('date', '=', $Month)->get()->sum('bill_amount_given');
        $Data['OutStanding'] = Bill::whereYear('date', '=', $Year)->whereMonth('date', '=', $Month)->get()->sum('balance_amount');
        $Data['Expense'] = Expense::whereYear('date', '=', $Year)->whereMonth('date', '=', $Month)->get()->sum('amount');

        $Data['Extra_Income'] = ExtraIncome::whereYear('date', '=', $Year)->whereMonth('date', '=', $Month)->get()->sum('amount');
        $OutStandings = Bill::whereYear('date', '=', $Year)->whereMonth('date', '=', $Month)->get();
        return $Data;
    }
}

if (! function_exists('DashboardIncomeDetails')) {
    function DashboardIncomeDetails($Month,$Year) {
        $Data['Income'] = Bill::whereMonth('date',$Month)->whereYear('date',$Year)->get();
        $Data['Expense'] = Expense::whereMonth('date',$Month)->whereYear('date',$Year)->get();
        $Data['Extra_Incomes'] = ExtraIncome::whereMonth('date',$Month)->whereYear('date',$Year)->get();
        return $Data;
    }
}
