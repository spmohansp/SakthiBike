@extends('admin.layouts.master')

@section('Current-Page')
Attendence Register
@endsection

@section('Parent-Menu')
Stock
@endsection

@section('Menu')
Attendence Register
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
                    <form action="{{ action('BillingController\SalaryController@store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            {{-- <div class="col-lg-4">
                                <div class="form-group"><h5><b>Employee Name</b></h5>
                                   <select class="form-control" name="name" required="" id="Employee">
                                      <option value="">Select Employee Name</option>
                                      @foreach($Employees as $Employee)
                                        <option value={{ $Employee->id }}>{{ $Employee->name}} </option>
                                      @endforeach 
                                   </select>
                                </div>
                             </div> --}}
                            <div class="col-lg-4">
                                <div class="form-group"><h5><b>From Date</b></h5>
                                    <input type="date" class="form-control" value="{{ old('date') }}" name="date">
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
                                                            <input type="radio" name="employee[attendence][{{$key}}]" value="1" checked>Present
                                                        </label>
                                                        <label class="radio-inline">&nbsp;
                                                            <input type="radio" name="employee[attendence][{{$key}}]" value="0">Absent
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
<script type="text/javascript" src="{{ url('billing/js/plugins/select2.min.js') }}"></script>

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker4').datetimepicker();
        });
        $('#Employee').select2();
    </script>
@endsection