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
				<button class="btn btn-primary pull-right btn-md" type="button" onclick="window.location.href='{{ action('BillingController\ExtraIncomeController@index') }}'">View Extra Incomes
				</button>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<form action="{{ action('BillingController\ExtraIncomeController@update',$ExtraIncome->id) }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					{{method_field('PUT')}}
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label class="col-form-label col-form-label-lg " for="inputLarge">date</label>
								<input class="form-control"  type="date"  placeholder="Enter Name" value="{{ $ExtraIncome->date }}" name="date" required>
							</div>
						</div>
						<div class='col-sm-4'>
							<div class="form-group">
								<label class="col-form-label col-form-label-lg " for="inputLarge">Amount</label>
								<input type='number' class="form-control" placeholder="Enter Amount" value="{{ $ExtraIncome->amount }}" name="amount"/ required>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label class="col-form-label col-form-label-lg " for="inputLarge">Description</label>
								<textarea rows="4" cols="50" class="form-control" placeholder="Enter Income Description" name="description">{{ $ExtraIncome->description }}</textarea>
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
@endsection