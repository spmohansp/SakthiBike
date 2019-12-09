@extends('admin.layouts.master')

@section('Current-Page')
{{-- {{ @$Salary->Salary->name }} --}}
@endsection

@section('Parent-Menu')
Stock
@endsection

@section('Menu')
view Salary
@endsection

@section('content')

<div class="tile">
	<label><b>Daily Attendence</b></label>
<table border="1" cellspacing="10" cellpadding="10">
  <tbody>
  	@foreach($Salary as $salaries)
    <tr>
    	
<td><input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">{{ $salaries->from_date }}</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">{{ $salaries->from_date }}</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
<td> <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" data-date="2016-4-4">04</td>
    </tr>
   @endforeach
  </tbody>
</table>
</div>
@endsection

{{-- @section('loadMore')
<script>
	$('#save_planning').click(function() {

  var cycleLength = $('#cycle_length').val();
  var numDays = $('.fc-day').length;

  for (var i = 0; i < numDays; i++) {
    $('.fc-day').eq(i).append($('<input>', {
      type: "checkbox",
      class: "checkbox" + ((i % cycleLength) + 1)
    }));
  }

</script>
@endsection --}}