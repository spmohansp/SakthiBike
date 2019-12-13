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
            <h1 class="th">SRI SAKTHI BIKE ZONE</h1>
            <P><b>All Two Wheelers Servixe Center</b></P>
            <P style="margin-top: -15px;"><b>Opp SPM Hospital, Rajiv Nagar, Alamarathu Compound</b></P>
            <p style="margin-top: -15px;"><b>Tiruchengode - 637211,Namakkal(Dt)</b></p>
            <p style="margin-top: -15px;"><b>Cell : 9003885959 , 9025837777</b></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-12 col-sm-12" style="text-align: center !important;">
            <h4 class="th"> Service Bill </h4>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-sm-6" style="text-align: left !important;">
            <h5 class="th">Bill No : {{ $Bill->bill_number }}</h5>
          </div>
          <div class="col-lg-6 col-sm-6"style="text-align: right !important;">
            <h5 class="th">Date :  {{ $Bill->date }}<br> 
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-sm-6" style="text-align: left !important;">
            <h5 class="th"> Name : <span style="font-size: 16px; font-style: italic;">{{ $Bill->Client->name }}</span></h5>
          </div>
          <div class="col-lg-6 col-sm-6" style="text-align: right !important;">
            <h5 class="th"> Phone Number : <span style="font-size: 16px;font-style: italic;">{{ $Bill->Client->phone_number }}</span></h5>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-sm-6" style="text-align: left !important;">
            <h5 class="th"> Bike No : <span style="font-size: 16px;font-style: italic;">{{ $Bill->Client->bike_no }}</span></h5>
          </div>
          <div class="col-lg-6 col-sm-6" style="text-align: right !important;">
            <h5 class="th"> Next Service Km : <span style="font-size: 16px;font-style: italic;">{{ $Bill->Client->service_km }}</span></h5>
          </div>
        </div>
        </div>
        <div class="row">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Particulars</th>
                  <th>Qty</th>
                  <th>Rate</th>
                  <th>Rs</th>
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

                @foreach($ExtraWorks as $key=>$Extrawork)
                <tr>
                  <th colspan="4" style="text-align: right !important;"><h5>{{ $Extrawork->BillExtraWork->name }} : </h5></th>
                  <th><h5>{{ $Extrawork->amount }}</h5></th>
                </tr>
                @endforeach


                <tr>
                  <th colspan="4" style="text-align: right !important;"><h5>Net Total : </h5></th>
                  <th><h5>{{ $Bill->bill_amount }}</h5></th>
                </tr>
                <tr>

                  <th colspan="4" style="text-align: right !important;"><h5>Gross Total : </h5></th>
                  <th><h5>{{ $Bill->bill_amount - $Bill->discount_amount }}</h5></th>
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
          <div class="col-lg-6 col-sm-6" style="text-align: left !important;">
            <br><br><br>
            <h5 class="th">Customer Signature </h5>
          </div>
          <div class="col-lg-6 col-sm-6"style="text-align: right !important;">
            <h5 class="th"><span style="font-size: 14px;">For </span>Sri Sakthi Bike Zone<br> <br> <br> 
            <p><b><span style="font-size: 14px;">Authorized Signature</span></b></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-12 col-sm-12"style="text-align: center !important;">
            <h5 class="th">நன்றி மீண்டும் வருக !!!</h5>
          </div>
        </div>
      </div>
    </div>
  </body>
@endsection

