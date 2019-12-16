@extends('admin.layouts.master')

@section('Current-Page')
View Attendence 
@endsection

@section('Parent-Menu')
Stock
@endsection

@section('Menu')
view Attendence
@endsection

@section('content')


 <div class="tile">
      <div class="pad">
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group"><h5><b>Select Employee</b></h5>
                    <select name="employee_id" class="form-control employee_id">
                      <option value="" selected disabled>Select Employee</option>}
                      @foreach($Employees as $key=>$Employee)
                        <option value="{{ $Employee->id }}">{{ $Employee->name }}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"><h5><b>From Date</b></h5>
                    <input type="date" class="form-control From_Date" name="from_date">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"><h5><b>To Date</b></h5>
                    <input type="date" class="form-control To_Date" name="to_date">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"><h5><b></b></h5>
                    <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ action('BillingController\SalaryController@create') }}'">Add Attendence</button>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
        <div class="col-md-12">
          <div class="">
            <div class="tile-body table-responsive">
              <table class="table ">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>No of Working Day(s)</th>
                    <th>Per Day Salary</th>
                    <th>Total Salary</th>
                    <th class="Action">Action</th>
                  </tr>
                </thead>
                <tbody class="AjaxEmployeeDetails"></tbody>
                <tbody class="EmployeeDetails">
                  @foreach($Employees as $Employee)
                    @php
                      $GetSalaryDetails = @GetSalaryDetails($Employee->id,date('m'),date('Y'));
                    @endphp
                  <tr>
                    <td class="name">{{ $Employee->name }}</td>
                    <td>{{ isset($GetSalaryDetails["AttendenceCount"]) ? $GetSalaryDetails["AttendenceCount"] : 0 }}</td>
                    <td>{{ isset($GetSalaryDetails["Employee"]) ? $GetSalaryDetails["Employee"]->amount_per_day : 0 }}</td>
                    <td>{{ @$GetSalaryDetails["AttendenceCount"] * $GetSalaryDetails["Employee"]->amount_per_day - $GetSalaryDetails["Expense"] }}</td>
                    <td>
                      <form action="{{ action('BillingController\SalaryController@destroy',$Employee->id) }}" method="POST">
                          {{ csrf_field() }}
                           <a href="{{ action('BillingController\SalaryController@show',$Employee->id) }}" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true" style="color:#fff"></i></a>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>

@endsection

@section('loadMore')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
    <script src="{{ url('billing/js/jquery-3.2.1.min.js') }}"></script>

    <script type="text/javascript">


        $(document).ready(function() {
            
            $('.AjaxEmployeeDetails').hide();

            $('body').on('change keyup','.employee_id,.From_Date,.To_Date',function (e) {
                e.preventDefault();
                var employee_id = $(".employee_id").val();
                var From_Date = $(".From_Date").val();
                var To_Date = $(".To_Date").val();
                if(employee_id !='' && From_Date !='' && To_Date !=''){
                    $.ajax({
                        type: 'get',
                        url: "{{ route('admin.GetSalaryDetails') }}",
                        data:{employee_id:employee_id,From_Date:From_Date,To_Date:To_Date},
                        success:function (data) {
                            var Count = 0;
                            $.each(data.salary,function (key,value) {
                              if(value.attendence!=0){
                                $('.AjaxEmployeeDetails').show();
                                $('.EmployeeDetails').hide();
                                $('.Action').hide();
                                var Counts = ++Count;
                                TotalSalary = Counts * data.Employee.amount_per_day - data.Expense;
                                var EmployeeDetail = 'tr' +
                                '<td>'+data.Employee.name+'</td>' +
                                '<td>'+Counts+'</td>' +
                                '<td>'+data.Employee.amount_per_day+'</td>' +
                                '<td>'+TotalSalary+'</td>' +
                                '</tr>';
                                $('.AjaxEmployeeDetails').html(EmployeeDetail);
                              }
                            })
                        },
                          error: function (ajaxContext) {
                              alert('No Data For in between the Dates')
                          }
                    })
                }
             });
             });

    </script>

@endsection
