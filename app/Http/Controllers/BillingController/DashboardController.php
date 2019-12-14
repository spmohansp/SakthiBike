<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;
class DashboardController extends Controller
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
    public function GetTotalDashboardIncomeExpense(){
        $DateMonthYear = explode('-',request('year'));
        $year = $DateMonthYear[0];
        $month = $DateMonthYear[1];
        $Months= date('F', mktime(0, 0, 0, $month, 10));
        $final['expense'] = '<div class="card-body my-2">
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0 font-weight-light" id="Expense">
                          <h5>'.$Months.'-'.$year.'</h5>
                             <h3>'.DashboardMonthlyWiseTotalExpense($month,$year).'</h3>
                        </h2>
                    </div>
                    <div class="col-4 text-right">
                        <span class="text-muted">64%</span>
                    </div>
                </div>

                
            </div>';
        return $final;
    }
}
