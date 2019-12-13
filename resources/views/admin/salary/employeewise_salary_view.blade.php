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