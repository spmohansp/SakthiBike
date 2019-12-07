<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ExtraWork;


class ExtraWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 1;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Data['ExtraWorks'] = ExtraWork::get();
        return view('admin.ExtraIncome.add',$Data);
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
            'name' => 'required',
        ]);
        try {
            // return request()->all();
            $ExtraWork = new ExtraWork;
            $ExtraWork->name = request('name');  
            $ExtraWork->amount = request('amount');
            $ExtraWork->save();
            return redirect(action('BillingController\ExtraWorkController@create'))->with('success','ExtraWork Created Successfully');
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
        $Data['ExtraWork'] = ExtraWork::findorfail($id);
        return view('admin.ExtraIncome.edit',$Data);
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
            $ExtraWork = ExtraWork::findorfail($id);
            $ExtraWork->name = request('name');  
            $ExtraWork->amount = request('amount');
            $ExtraWork->save();
            return redirect(action('BillingController\ExtraWorkController@create'))->with('success','ExtraWork Updated Successfully');
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
        ExtraWork::findOrFail($id)->delete();
        return back()->with('success','Extra Income Deleted Successfully');
    }
}
