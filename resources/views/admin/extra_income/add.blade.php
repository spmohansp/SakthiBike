@extends('admin.layouts.master')

@section('Current-Page')
Add Extra Income 
@endsection

@section('Parent-Menu')
Extra Income
@endsection

@section('Menu')
Add Extra Income
@endsection

@section('content')

	<div class="tile">
		<div class="row">
			<div class="col-lg-12">
				<h4>Extra Income</h4>
				<button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ action('BillingController\EmployeeController@index') }}'">View Incomes
				</button>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<form action="{{ action('BillingController\ExtraIncomeController@store') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label class="col-form-label col-form-label-lg " for="inputLarge">date</label>
								<input class="form-control"  type="date"  placeholder="Enter Name" value="{{ old('date') }}" name="date">
							</div>
						</div>
						<div class='col-sm-4'>
							<div class="form-group">
								<label class="col-form-label col-form-label-lg " for="inputLarge">Amount</label>
								<input type='number' class="form-control" placeholder="Enter Amount" value="{{ old('amount') }}" name="amount"/>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label class="col-form-label col-form-label-lg " for="inputLarge">Description</label>
								<textarea rows="4" cols="50" class="form-control" placeholder="Enter Income Description" name="description">{{ old('description') }}</textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-7">
							<button class="btn btn-primary pull-right" type="submit">Add</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection