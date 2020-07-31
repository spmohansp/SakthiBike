<?php

use App\Salary;
use App\Employee;
use App\Expense;
use App\ExtraWork;
use App\Bill;
use App\ExtraIncome;
use App\Attendence;
use App\Stock;
use App\StockIncomePayment;

if (! function_exists('GetExtraWorkDetails')) {
    function GetExtraWorkDetails($ExtraworkId){
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
        $Data['Income'] = Bill::whereYear('date', '=', $Year)->whereMonth('date', '=', $Month)->sum('bill_amount_given');
        $Data['OutStanding'] = Bill::sum('balance_amount');
        $Data['Expense'] = Expense::whereYear('date', '=', $Year)->whereMonth('date', '=', $Month)->sum('amount') + Stock::whereYear('date', '=', $Year)->whereMonth('date', '=', $Month)->sum('amount_given')+ StockIncomePayment::whereYear('date', '=', $Year)->whereMonth('date', '=', $Month)->sum('amount');
        $Data['Extra_Income'] = ExtraIncome::whereYear('date', '=', $Year)->whereMonth('date', '=', $Month)->get()->sum('amount');
        $Data['shopBalance'] = Stock::where('balance','!=',0)->sum('balance') - StockIncomePayment::where('amount','!=',0)->sum('amount');

        return $Data;
    }
}

if (! function_exists('DashboardIncomeDetails')) {
    function DashboardIncomeDetails($Month,$Year) {
        $Data['Income'] = Bill::where('bill_amount_given','!=',0)->whereMonth('date',$Month)->whereYear('date',$Year)->get();
        $Data['Expense'] = Expense::whereMonth('date',$Month)->whereYear('date',$Year)->get();
        $Data['Extra_Incomes'] = ExtraIncome::whereMonth('date',$Month)->whereYear('date',$Year)->get();
        $Data['Stocks'] = Stock::where('amount_given','!=',0)->whereYear('date', '=', $Year)->whereMonth('date', '=', $Month)->get();
        $Data['StockIncomePayment'] = StockIncomePayment::where('amount','!=',0)->whereYear('date', '=', $Year)->whereMonth('date', '=', $Month)->get();
        return $Data;
    }
}


if (! function_exists('ShopBalance')) {
    function ShopBalance($shop_id) {
        $Stocks = Stock::where('shop_id',$shop_id)->sum('balance');
        $StockIncomePayment = StockIncomePayment::where('shop_id',$shop_id)->sum('amount');
        return $Stocks  - $StockIncomePayment;
    }
}
