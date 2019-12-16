@extends('admin.layouts.master') 

@section('Current-Page') 
Income MonthlyWise 
@endsection 

@section('Parent-Menu') 
Income 
@endsection 

@section('Menu') 
Income MonthlyWise 
@endsection 

@section('content')


@php
    $PrevM =  Carbon\Carbon::parse($Year.'-'.$Month)->subMonth()->format('m'); 
    $PrevY =  Carbon\Carbon::parse($Year.'-'.$Month)->subMonth()->format('Y'); 
    $NextM =  Carbon\Carbon::parse($Year.'-'.$Month)->addMonthsNoOverflow(1)->format('m'); 
    $NextY =  Carbon\Carbon::parse($Year.'-'.$Month)->addMonthsNoOverflow(1)->format('Y'); 
@endphp

	<div class="tile">
		<ul class="pager">
			<br>
			<li class="previouspull-left"><a href="{{ route('admin.GetMonthlyIncome',[$PrevM,$PrevY]) }}">&laquo; Previous</a></li>
			<li class="next pull-right"><a href="{{ route('admin.GetMonthlyIncome',[$NextM,$NextY]) }}">Next &raquo;</a></li>
		</ul>
	</div>

	@php
        $DashboardIncomeDetails = DashboardIncomeDetails($Month,$Year);
    @endphp

	<div class="tile">
		<div class="row">
			<div class="card-body table-responsive" id="printdiv">
				<table class="table table-hover table-bordered" id="reporttable">
					<thead>
						<tr>
							<th class="csvth">S.no</th>
							<th class="csvth">Date</th>
							<th class="csvth">Bill No</th>
							<th class="csvth">Customer Name</th>
							<th class="csvth">Total Cost</th>
							<th class="csvth">Balance</th>
						</tr>
					</thead>
					<tbody  id="tablebody">
						@foreach($DashboardIncomeDetails['Income'] as $key=>$Income)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ date('d-m-Y',strtotime($Income->date)) }}</td>
								<td>{{ $Income->bill_number }}</td>
								<td>{{ $Income->Client->name }}</td>
                                <td>{{ $Income->bill_amount }}</td>
                                <td>{{ $Income->balance_amount }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
								
@endsection