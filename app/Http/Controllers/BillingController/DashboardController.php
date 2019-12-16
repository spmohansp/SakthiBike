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
        $MonthlyIncomeBar = $DashboardMonthlyWiseTotalIncomeExpense['Income']/100;
        $MonthlyExpenseBar = $DashboardMonthlyWiseTotalIncomeExpense['Expense']/100;
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
                                 ₹'.$DashboardMonthlyWiseTotalIncomeExpense['Income'].'
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
            <a href="'.route('admin.viewExpense').'" style="color:black;text-decoration: none">
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
        return $final;
    }
}
