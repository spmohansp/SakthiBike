@extends('admin.layouts.master')

@section('Current-Page')
Dashboard
@endsection

@section('Parent-Menu')
Home
@endsection

@section('Menu')
    Dashboard
@endsection

@section('content')

	 <?php
	    $DashboardMonthlyWiseTotalIncomeExpense = DashboardMonthlyWiseTotalIncomeExpense(date('m'),date('Y'));
	    $MonthlyProfit = $DashboardMonthlyWiseTotalIncomeExpense['Income'] + $DashboardMonthlyWiseTotalIncomeExpense['Extra_Income'] - $DashboardMonthlyWiseTotalIncomeExpense['Expense'];
	    $IncomeBar = $DashboardMonthlyWiseTotalIncomeExpense['Income']/100;
	    $ExpenseBar = $DashboardMonthlyWiseTotalIncomeExpense['Expense']/100;
	    $MonthlyProfitBar = $MonthlyProfit/100;
	 ?>
	 <div class="tile" style="background-color: #F0F0F0;">
		<div class="row">
	        <div class="col-sm-4">
	            <input type="month" class="form-control dashboardDate" id="year" value="{{ date("Y-m") }}" max="{{ date("Y-m") }}">
	        </div>
	    </div>
	    <br>
		<div class="row">
			<div class="col-lg-6 col-xl-3 d-flex" id="DashboardIncome">
				<div class="card flex-fill">
					<div class="card-header">
						<span class="badge badge-primary float-right">Monthly</span>
						<h5 class="card-title mb-0">Income</h5>
					</div>
					<a href="{{ route('admin.GetMonthlyIncome',[date('m'),date('Y')]) }}" style="color:black;text-decoration: none;">
						<div class="card-body my-2">
							<div class="row d-flex align-items-center mb-4">
								<div class="col-8">
									<h5>{{ date('F', mktime(0, 0, 0, date('m'), 10)) }} - {{ date('Y') }}</h5>
									<h2 class="d-flex align-items-center mb-0 font-weight-light" id="Income">
										₹{{ $DashboardMonthlyWiseTotalIncomeExpense['Income'] + $DashboardMonthlyWiseTotalIncomeExpense['Extra_Income'] }}
									</h2>
								</div>
								<div class="col-4 text-right">
									<span class="text-muted">{{ $IncomeBar }}%</span>
								</div>
							</div>
							<div class="progress progress-sm shadow-sm mb-1">
								<div class="progress-bar bg-primary" role="progressbar" style="width: {{ $IncomeBar }}%"></div>
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="col-lg-6 col-xl-3 d-flex">
				<div class="card flex-fill" id="DashboardExpense">
					<div class="card-header">
						<span class="badge badge-info float-right">Monthly</span>
						<h5 class="card-title mb-0">Expense</h5>
					</div>
					<a href="{{ route('admin.GetMonthlyIncome',[date('m'),date('Y')]) }}" style="color:black;text-decoration: none;">
						<div class="card-body my-2">
							<div class="row d-flex align-items-center mb-4">
								<div class="col-8">
									<h5>{{ date('F', mktime(0, 0, 0, date('m'), 10)) }} - {{ date('Y') }}</h5>
									<h2 class="d-flex align-items-center mb-0 font-weight-light" id="Expense">
										₹{{ $DashboardMonthlyWiseTotalIncomeExpense['Expense'] }}
									</h2>
								</div>
								<div class="col-4 text-right">
									<span class="text-muted">{{ $ExpenseBar }}%</span>
								</div>
							</div>
							<div class="progress progress-sm shadow-sm mb-1">
								<div class="progress-bar bg-info" role="progressbar" style="width: {{ $ExpenseBar }}%"></div>
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="col-lg-6 col-xl-3 d-flex">
				<div class="card flex-fill" id="DashboardMonthlyProfit">
					<div class="card-header">
						<span class="badge badge-success float-right">Monthly</span>
						<h5 class="card-title mb-0">Profit</h5>
					</div>
					<div class="card-body my-2">
						<div class="row d-flex align-items-center mb-4">
							<div class="col-8">
								<h5>{{ date('F', mktime(0, 0, 0, date('m'), 10)) }} - {{ date('Y') }}</h5>
								<h2 class="d-flex align-items-center mb-0 font-weight-light">
									₹{{ $MonthlyProfit }}
								</h2>
							</div>
							<div class="col-4 text-right">
								<span class="text-muted">{{ $MonthlyProfitBar }}%</span>
							</div>
						</div>
						<div class="progress progress-sm shadow-sm mb-1">
							<div class="progress-bar bg-success" role="progressbar" style="width: {{ $MonthlyProfitBar }}%"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-xl-3 d-flex">
				<div class="card flex-fill" id="DashboardMonthlyOutStanding">
					<div class="card-header">
						<span class="badge badge-warning float-right">Monthly</span>
						<h5 class="card-title mb-0">OutStanding</h5>
					</div>
					<a href="{{ route('admin.GetMonthlyIncome',[date('m'),date('Y')]) }}" style="color:black;text-decoration: none;">
						<div class="card-body my-2">
							<div class="row d-flex align-items-center mb-4">
								<div class="col-8">
									<h5>{{ date('F', mktime(0, 0, 0, date('m'), 10)) }} - {{ date('Y') }}</h5>
									<h2 class="d-flex align-items-center mb-0 font-weight-light">
										₹{{ $DashboardMonthlyWiseTotalIncomeExpense['OutStanding'] }}
									</h2>
								</div>
								<div class="col-4 text-right">
									<span class="text-muted">82%</span>
								</div>
							</div>
							<div class="progress progress-sm shadow-sm mb-1">
								<div class="progress-bar bg-warning" role="progressbar" style="width: 82%"></div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('loadMore')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
        $(".dashboardDate").on('change',function() {
          GetDashboardIncomeExpense();
        });

	        function GetDashboardIncomeExpense() {
	          var year =$('#year').val();
	          console.log(year);
	            $.ajax({
	                type : "get",
	                url : '{{ action("BillingController\DashboardController@GetTotalDashboardIncomeExpense") }}',
	                data:{year:year},
	                beforeSend: function() {
	                    $('#DashboardIncome').find('h2').html('<div class="overlay"><i class="fa fa-refresh fa-spin" style="size:26px;"></i></div>');
	                    $('#DashboardExpense').find('h2').html('<div class="overlay"><i class="fa fa-refresh fa-spin" style="size:26px;"></i></div>');
	                    $('#DashboardMonthlyProfit').find('h2').html('<div class="overlay"><i class="fa fa-refresh fa-spin" style="size:26px;"></i></div>');
	                    $('#DashboardMonthlyOutStanding').find('h2').html('<div class="overlay"><i class="fa fa-refresh fa-spin" style="size:26px;"></i></div>');
	                },
	                success:function(data){
	                    setTimeout(function() {
	                        $('#DashboardIncome').html(data.income);
	                        $('#DashboardExpense').html(data.expense);
	                        $('#DashboardMonthlyProfit').html(data.Profit);
	                        $('#DashboardMonthlyOutStanding').html(data.OutStanding);
	                    }, 2000);
	                }
	          });
	        }
        });
    </script>
@endsection
