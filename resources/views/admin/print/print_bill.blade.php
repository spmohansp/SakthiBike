@extends('admin.layouts.master')

@section('Current-Page')
    Add Print
@endsection

@section('Parent-Menu')
    Transactions
@endsection

@section('Menu')
    Add Print
    @endsection

    @section('content')
<html xmlns="http://www.w3.org/1999/xhtml" lang="ta" xml:lang="ta">

    <style media="screen">
      @@font-face {
        font-family: latha;
        src: url(fonts/latha.ttf);
      }
      .th,.tp{
        font-family: latha;
        text-align: center;
      }
      .tl {
        font-family: latha;
        text-align:left;
      }
      .tr {
        font-family: latha;
        text-align:right;
      }
      body{
        top: 0 !important;
        margin: 0 !important;
        padding: 0 !important;
        height: 100% !important;
      }
      @media only screen and (max-width: 600px) {
        .th,.tp{
          font-family: latha;
          text-align: center;
        }
        .tl {
          font-family: latha;
          text-align:left;
        }
        .tr {
          font-family: latha;
          text-align:right;
        }

      }
    </style>
  <body class="app sidebar-mini rtl" style="top:0 !important;">

    <div class="tile" >
      <div class="">
        <div class="row">

          <div class="col-lg-12 col-sm-12" style="text-align: center !important;">
            <h1 class="th" >Greefi Technologies</h1>
            <h4 class="th">Pullipalayam</h4>
          </div>

        </div>
        <div class="row">
          <div class="col-lg-6 col-sm-6" style="text-align: left !important;">
            <h4 class="th">தொலைபேசி எண் : 044 - 254789</h4>
          </div>
          <div class="col-lg-6 col-sm-6" style="text-align: right !important;">
            <h4 class="th">மொபைல் எண் : 0123654789</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-sm-12"style="text-align: center !important;">
            <h4 class="th">G.S.T : 123456789 GR 1010</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-sm-12" style="text-align: center !important;">
            <h4 class="th"> <u>வரி &nbspவிலைப்பட்டியல்</u> </h4>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <h4 class="th"> To :</h4>
            <h5 class="th" style="margin-left: 45px;">{{ $Bill->Client->name }}</h5>
            <h5 class="th" style="margin-left: 45px;">{{ $Bill->Client->bike_no }}</h5>
            <h5 class="th" style="margin-left: 45px;">{{ $Bill->Client->phone_number }}</h5>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6 col-sm-6"style="text-align: left !important;">
            <h5 class="th">விலைப்பட்டியல் எண் : {{ $Bill->bill_number }}</h5>
          </div>
          <div class="col-lg-6 col-sm-6"style="text-align: right !important;">
            <h5 class="th">தேதி :  {{ $Bill->date }}<br> 
            <br>நேரம் : <span id="time"></span> </h5>
          </div>
        </div>
        <div class="row">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>விவரங்கள்</th>
                  <th>அளவு</th>
                  <th>மதிப்பீடு</th>
                  <th>தொகை</th>
                </tr>
              </thead>
              <tbody>
                @foreach($Bill->BillProducts as $key=>$Product)
                <tr>
                  <th>{{ ++$key }}</th>
                  <th>{{ @$Product->Product->Product_Name }}</th>
                  <th>{{ @$Product->quantity }}</th>
                  <th>{{ @$Product->Product->Selling_Price }}</th>
                  <th>{{ @$Product->Total_Cost }}</th>
                </tr>
                @endforeach
                  <th colspan="4" class="tr" style="text-align: right !important;">கூட்டுத்தொகை : </th>
                  <th>{{ @$Product->sum('Total_Cost') }}</th>
                </tr>
                <tr>

                  <th colspan="4" class="tr" style="text-align: right !important;">பெரும் மொத்தம் : </th>
                  <th>{{ @$Product->sum('Total_Cost') }}</th>
                </tr>
                <tr>
                  <th colspan="6"></th>

                </tr>
              </tbody>

            </table>
          </div>
          <hr>
        </div>
        <div class="row">
          <div class="col-lg-12 col-sm-12"style="text-align: center !important;">
            <h5 class="th">நன்றி மீண்டும் வருக !!!</h5>
          </div>
        </div>
      </div>
    </div>
  </body>
    @endsection

@section('loadMore')

    <script>
        var d = new Date();
        document.getElementById("date").innerHTML = d.toLocaleDateString();
        var t = new Date();
        document.getElementById("time").innerHTML = t.toLocaleTimeString();
    </script>
    @endsection
