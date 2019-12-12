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
	<html>
<head>
<style>
* {box-sizing: border-box;}
ul {list-style-type: none;}
body {font-family: Verdana, sans-serif;}

.month {
  padding: 70px 25px;
  width: 100%;
  background: #1abc9c;
  text-align: center;
}

.month ul {
  margin: 0;
  padding: 0;
}

.month ul li {
  color: white;
  font-size: 20px;
  text-transform: uppercase;
  letter-spacing: 3px;
}

.month .prev {
  float: left;
  padding-top: 10px;
}

.month .next {
  float: right;
  padding-top: 10px;
}

.weekdays {
  margin: 0;
  padding: 10px 0;
  background-color: #ddd;
}

.weekdays li {
  display: inline-block;
  width: 13.6%;
  color: #666;
  text-align: center;
}

.days {
  padding: 10px 0;
  background: #eee;
  margin: 0;
}

.days li {
  list-style-type: none;
  display: inline-block;
  width: 13.6%;
  text-align: center;
  margin-bottom: 5px;
  font-size:12px;
  color: #777;
}

.days li .active {
  padding: 5px;
  background: #1abc9c;
  color: white !important
}

/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
  .weekdays li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
  .weekdays li, .days li {width: 12.5%;}
  .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
  .weekdays li, .days li {width: 12.2%;}
}
</style>
</head>
<body>

<h1>CSS Calendar</h1>

<div class="month">      
  <ul>
    <li class="prev">&#10094;</li>
    <li class="next">&#10095;</li>
    <li>
      <?php echo date('m');?><br>
      <span style="font-size:18px"><?php echo date('Y');?></span>
    </li>
  </ul>
</div>

<ul class="weekdays">
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
  <li>Su</li>
</ul>

<ul class="days">  
  <li></li>
  <li></li>
  <li></li>
  <tr>
   @foreach($Salary as $salaries)

  <li><td>{{ $salaries->from_date}}</td></li>
@endforeach
</tr>
</ul>

</body>
</html>
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