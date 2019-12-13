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

<div class="tile">
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ action('BillingController\SalaryController@index') }}'">View Atttendence
            </button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ action('BillingController\SalaryController@update',$Attendence->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group"><h5><b>From Date</b></h5>
                                    <input type="date" class="form-control" value="{{ $Attendence->date }}" name="date">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tile-footer">
                                    <table class="table table-bordered" id="VehicleTable">
                                        <thead>
                                            <tr>
                                                <th>Employee Name</th>
                                                <th>Employee Attendence</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($Employees as $key=>$Employee)
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="employee[name][{{$key}}]" value="{{ $Employee->id }}">{{ $Employee->name }}
                                                    </td>
                                                    <td>
                                                        <label class="radio-inline">&nbsp;
                                                            <input type="radio" name="employee[attendence][{{$key}}]" value="1" {{ in_array(1,array(@$Salaries[$key]))?'checked' : '' }}>Present
                                                        </label>
                                                        <label class="radio-inline">&nbsp;
                                                            <input type="radio" name="employee[attendence][{{$key}}]" value="0" {{ in_array(0,array(@$Salaries[$key]))?'checked' : '' }}>Absent
                                                        </label>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tile-footer">
                                    <button class="btn btn-primary center-block" type="submit">Add Attendence</button>
                                </div>
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