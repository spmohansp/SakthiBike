@extends('admin.layouts.master')

@section('Current-Page')
Add Salary
@endsection

@section('Parent-Menu')
{{-- Stock --}}
@endsection

@section('Menu')
Salary Detail
@endsection

@section('content')


<div class="title">
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ action('BillingController\SalaryController@index') }}'">View Salary Details
            </button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ action('BillingController\SalaryController@store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group"><h5><b>Employee Name</b></h5>
                                    <input class="form-control form-control-lg" id="" type="text"  placeholder="Enter Name" value="{{ old('name') }}" name="name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group"><h5><b>From Date</b></h5>
                                    <input type="datetime-local"  class="form-control" value="{{ old('from_date') }}" name="from_date">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group"><h5><b>To Date</b></h5>
                                    <input type="datetime-local"  class="form-control" value="{{ old('to_date') }}" name="to_date">
                                </div>
                            </div>
                         	
                        </div>							   
                        
					    <div class="row">
					        <div class='col-sm-4'>
					        	 <div class="form-group"><h5><b>Salary Per/DAy</b></h5>
					            <input type='number' class="form-control" placeholder="Enter Salary Per/Day" value="{{ old('amount_per_day') }}" name="amount_per_day"/>
					        </div>
					        </div>
					    </div>

                        <div class="row">
                            <div class="col-lg-7">
                                <button class="btn btn-primary pull-right" type="submit">Add Shop</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('loadMore')
	
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker4').datetimepicker();
        });
    </script>
@endsection