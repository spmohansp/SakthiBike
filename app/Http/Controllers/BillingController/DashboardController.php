<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;
use App\Bill;
use Auth;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users[] = Auth::user();
        $users[] = Auth::guard()->user();
        $users[] = Auth::guard('admin')->user();
        return view('admin.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function GetMonthlyIncome($Month,$Year)
    {
        $Data['Year'] = $Year;
        $Data['Month'] = $Month;
        $Data['Bills'] = Bill::orderBy('id', 'DESC')->get();
        return view('admin.dashboard.view_expense',$Data);
    }


    public function GetTotalDashboardIncomeExpense(){
        $DateMonthYear = explode('-',request('year'));
        $year = $DateMonthYear[0];
        $month = $DateMonthYear[1];
        $Months= date('F', mktime(0, 0, 0, $month, 10));
        $DashboardMonthlyWiseTotalIncomeExpense = DashboardMonthlyWiseTotalIncomeExpense($month,$year);
        $DashboardMonthlyWiseTotalIncomeExtraIncome = $DashboardMonthlyWiseTotalIncomeExpense['Income'] + $DashboardMonthlyWiseTotalIncomeExpense['Extra_Income'];
        $MonthlyProfit = $DashboardMonthlyWiseTotalIncomeExpense['Income'] + $DashboardMonthlyWiseTotalIncomeExpense['Extra_Income'] - $DashboardMonthlyWiseTotalIncomeExpense['Expense'];

        $MonthlyIncomeBar = $DashboardMonthlyWiseTotalIncomeExpense['Income']/100;
        $MonthlyExpenseBar = $DashboardMonthlyWiseTotalIncomeExpense['Expense']/100;
        $MonthlyOutStandingBar = $DashboardMonthlyWiseTotalIncomeExpense['OutStanding']/100;
        $MonthlyProfitBar = $MonthlyProfit/100;

        if($MonthlyProfit>=0) {  $Profitstyle='black'; } else{ $Profitstyle='red'; }

        $final['income'] = '
        <div class="card flex-fill" id="DashboardIncome">
            <div class="card-header">
                <span class="badge badge-primary float-right">Monthly</span>
                <h5 class="card-title mb-0">Income</h5>
            </div>
            <a href="'.route('admin.GetMonthlyIncome',[$month,$year]).'" style="color:black;text-decoration: none">
                <div class="card-body my-2">
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h5>'.$Months.'-'.$year.'</h5>
                            <h2 class="d-flex align-items-center mb-0 font-weight-light" id="Expense">
                                 ₹'.$DashboardMonthlyWiseTotalIncomeExtraIncome.'
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span class="text-muted">'.$MonthlyIncomeBar.'%</span>
                        </div>
                    </div>
                    <div class="progress progress-sm shadow-sm mb-1">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: '.$MonthlyIncomeBar.'%"></div>
                    </div>
                </div>
            </a>
        </div>';

        $final['expense'] = '
        <div class="card flex-fill" id="DashboardExpense">
            <div class="card-header">
                <span class="badge badge-info float-right">Monthly</span>
                <h5 class="card-title mb-0">Expense</h5>
            </div>
            <a href="'.route('admin.GetMonthlyIncome',[date('m'),date('Y')]).'" style="color:black;text-decoration: none">
                <div class="card-body my-2">
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h5>'.$Months.'-'.$year.'</h5>
                            <h2 class="d-flex align-items-center mb-0 font-weight-light" id="Expense">
                                 ₹'.$DashboardMonthlyWiseTotalIncomeExpense['Expense'].'
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span class="text-muted">'.$MonthlyExpenseBar.'%</span>
                        </div>
                    </div>
                    <div class="progress progress-sm shadow-sm mb-1">
                        <div class="progress-bar bg-info" role="progressbar" style="width: '.$MonthlyExpenseBar.'%"></div>
                    </div>
                </div>
            </a>
        </div>';

        $final['Profit'] = '
        <div class="card flex-fill" id="DashboardMonthlyProfit">
            <div class="card-header">
                <span class="badge badge-success float-right">Monthly</span>
                <h5 class="card-title mb-0">Profit</h5>
            </div>
            <div class="card-body my-2">
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-8" style="color:'.$Profitstyle.'">
                        <h5>'.$Months.'-'.$year.'</h5>
                        <h2 class="d-flex align-items-center mb-0 font-weight-light">
                             ₹'.$MonthlyProfit.'
                        </h2>
                    </div>
                    <div class="col-4 text-right">
                        <span class="text-muted">'.$MonthlyProfitBar.'%</span>
                    </div>
                </div>
                <div class="progress progress-sm shadow-sm mb-1">
                    <div class="progress-bar bg-success" role="progressbar" style="width: '.$MonthlyProfitBar.'%"></div>
                </div>
            </div>
        </div>';

        $final['OutStanding'] = '
        <div class="card flex-fill" id="DashboardMonthlyOutStanding">
            <div class="card-header">
                <span class="badge badge-warning float-right">Monthly</span>
                <h5 class="card-title mb-0">OutStanding</h5>
            </div>
            <a href="'.route('admin.GetMonthlyIncome',[date('m'),date('Y')]).'" style="color:black;text-decoration: none;">
                <div class="card-body my-2">
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h5>'.$Months.'-'.$year.'</h5>
                            <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                 ₹'.$DashboardMonthlyWiseTotalIncomeExpense['OutStanding'].'
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span class="text-muted">'.$MonthlyOutStandingBar.'%</span>
                        </div>
                    </div>
                    <div class="progress progress-sm shadow-sm mb-1">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: '.$MonthlyOutStandingBar.'%"></div>
                    </div>
                </div>
            </a>
        </div>';

        return $final;
    }
}
