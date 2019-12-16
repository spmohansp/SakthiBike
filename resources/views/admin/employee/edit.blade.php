@extends('admin.layouts.master')

@section('Current-Page')
Edit Emoloyee
@endsection

@section('Parent-Menu')
Stock
@endsection

@section('Menu')
Edit Emoloyee
@endsection

@section('content')

<div class="tile">
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ action('BillingController\EmployeeController@index') }}'">View Employee
            </button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ action('BillingController\EmployeeController@update',$Employee->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group"><h5><b>Employee Name</b></h5>
                                    <input class="form-control form-control-lg" id="" type="text"  placeholder="Enter Name" value="{{ $Employee->name }}" name="name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group"><h5><b>Mobile Number</b></h5>
                                    <input type="number"  class="form-control" placeholder="Enter Mobile Number" value="{{ $Employee->mobile}}" name="mobile">
                                </div>
                            </div>
                            <div class='col-sm-4'>
                                 <div class="form-group"><h5><b>Salary Per/DAy</b></h5>
                                    <input type='number' class="form-control" placeholder="Enter Salary Per/Day" value="{{ $Employee->amount_per_day }}" name="amount_per_day"/>
                                </div>
                            </div>
                        </div>							   
                        
                         <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group"><h5><b>Address</b></h5>
                                    <textarea rows="4" cols="50" class="form-control" name="address">{{ $Employee->address }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7">
                                <button class="btn btn-primary pull-right" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection