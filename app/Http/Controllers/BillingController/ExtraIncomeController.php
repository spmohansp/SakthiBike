<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ExtraIncome;

class ExtraIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data['ExtraIncomes'] = ExtraIncome::get();
        return view('admin.extra_income.view',$Data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.extra_income.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $ExtraIncome = new ExtraIncome;
            $ExtraIncome->date = request('date');
            $ExtraIncome->amount = request('amount');
            $ExtraIncome->description = request('description');
            $ExtraIncome->save();
            return back()->with('success','Extra Income Added Successfully!');
        }catch (\Exception $e){
            return back()->with('danger','Sorry,Something went wrong!.Extra Income Cannot be Stored!');
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
        $Data['ExtraIncome'] = ExtraIncome::findorfail($id);
        return view('admin.extra_income.edit',$Data);
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
            $ExtraIncome = ExtraIncome::findorfail($id);
            $ExtraIncome->date = request('date');
            $ExtraIncome->amount = request('amount');
            $ExtraIncome->description = request('description');
            $ExtraIncome->save();
            return back()->with('success','Extra Income Updated Successfully!');
        }catch (\Exception $e){
            return back()->with('danger','Sorry,Something went wrong!.Extra Income Cannot be Updated!');
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
        try {
            $ExtraIncome = ExtraIncome::findorfail($id)->delete();
            return back()->with('success','Extra Income Deleted Successfully!');
        }catch (\Exception $e){
            return back()->with('danger','Sorry,Something went wrong!.Extra Income Cannot be Deleted!');
        }
    }
}
