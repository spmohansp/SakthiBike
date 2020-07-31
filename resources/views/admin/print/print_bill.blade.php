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
        tr {
            font-family: latha;
            line-height: 5px;
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
                /*text-align: center;*/
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
                <div class="row" style="margin-top: -18px">
                    <div class="col-lg-12 col-sm-12" style="text-align: right !important;">
                        <h3 align="right">Sri Sakthi Bike</h3>
                        <P style="margin-top: -15px">All Two Wheelers Service Center</P>
                        <P style="margin-top: -15px;"> Opp SPM Hospital, Rajiv Nagar, Alamarathu Compound,Tiruchengode</P>
                        <p style="margin-top: -15px;">Cell : 9003885959 ,E-mail: srisakthibike@gmail.com</p>
                    </div>
                </div>
                <hr style="margin-top: -17px;">
                <div class="row" style="height: 15px;margin-top: -16px;">
                    <div class="col-lg-12 col-sm-12" style="text-align: center !important;">
                        <h5>Bill </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6" style="text-align: left !important;">
                        <h6>Bill To</h6>
                        <table class="table">
                            <tr>
                                <th colspan="2"> {{ $Bill->Client->name }} ({{ $Bill->Client->phone_number }})</th>
                            </tr>
                            <tr>
                                <td>Bike Detail</td>
                                <th style = "text-transform:uppercase;">: {{ $Bill->Client->bike_no }} ( {{ $Bill->Client->bike_name }} )</th>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-6 col-sm-6"style="text-align: left; !important;">
                        <br>
                        <table class="table">
                            <tr>
                                <td>Invoice Number</td>
                                <th>: {{ $Bill->bill_number }}</th>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <th>: {{ date("d-m-Y", strtotime($Bill->date)) }}</th>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item Name</th>
                                    <th>Quantity</th>
                                    <th>Price/Unit</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sno = 0; ?>
                                @foreach($Bill->BillProducts as $key=>$Product)
                                    <tr>
                                        <th>{{ ++$sno }}</th>
                                        <th style="text-transform:capitalize;">{{ @$Product->Product->Product_Name }}</th>
                                        <th style="text-align: center">{{ @$Product->quantity }}</th>
                                        <th style="text-align: right">{{ number_format(@$Product->Product->Selling_Price,2) }}</th>
                                        <th style="text-align: right">{{ number_format(@$Product->Total_Cost,2) }}</th>
                                    </tr>
                                @endforeach
                                   @foreach($Bill->BillAdditionalProduct as $key=>$Product1)
                                    <tr>
                                        <th>{{ ++$sno }}</th>
                                        <th style="text-transform:capitalize;">{{ @$Product1->name }}</th>
                                        <th style="text-align: center">{{ @$Product1->qty }}</th>
                                        <th style="text-align: right"></th>
                                        <th style="text-align: right">{{ number_format(@$Product1->amount,2) }}</th>
                                    </tr>
                                @endforeach
                                @foreach($ExtraWorks as $key1=>$Extrawork)
                                    <tr style="line-height: 7px;">
                                        <th colspan="3"></th>
                                        <th style = "text-transform:capitalize;"><i>{{ $Extrawork->BillExtraWork->name }}</i></th>
                                        <th style="text-align: right">{{ number_format($Extrawork->amount,2) }}</th>
                                    </tr>
                                @endforeach
                                <tr style="line-height: 7px;">
                                    <th></th>
                                    <th>Total</th>
                                    <th style="text-align: center">{{ $Bill->BillProducts->sum('quantity') + $Bill->BillAdditionalProduct->sum('qty') }}</th>
                                    <th></th>
                                    <th style="text-align: right">{{ number_format($Bill->bill_amount,2) }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="row" style="margin-bottom: -15px">
                    <div class="col-lg-7 col-sm-7" style="text-align: left !important;">
                        <h6>Invoice Amount In Words</h6>
                        <p style = "text-transform:capitalize;">{{ displaywords($Bill->bill_amount) }}</p>
                        <br>
                       {{--  <h6>Payment Type</h6>
                        <p>Cash</p>
                        <br> --}}
                       {{--  <h6>Terms and conditions:-</h6>
                        <p>Thanks for doing service with us.</p> --}}
                    </div>
                    <div class="col-lg-5 col-sm-5"style="text-align: left !important;">
                       <table class="table">
                           <tr>
                               <td>Sub Total</td>
                               <th>:₹ {{ number_format($Bill->bill_amount,2) }}</th>
                           </tr>
                            <tr>
                               <td>Total</td>
                               <th>:₹ {{ number_format($Bill->bill_amount,2) }}</th>
                           </tr> 
                           <tr>
                               <td>Recevied</td>
                               <th>:₹ {{ number_format($Bill->bill_amount_given,2) }}</th>
                           </tr>
                           <tr>
                               <td>Balance</td>
                               <th>:₹ {{ number_format($Bill->balance_amount,2) }}</th>
                           </tr>
                       </table>
                    </div>
                </div>
                <hr>
                <div class="row" style="margin-top: -10px;">
                    <div class="col-lg-6 col-sm-6" style="text-align: left !important;">
                        <br><br><br>
                        <h5 class="th">Customer Signature </h5>
                    </div>
                    <div class="col-lg-6 col-sm-6"style="text-align: right !important;">
                        <h5 class="th">
                        <span style="font-size: 14px;">For </span>Sri Sakthi Bike<br> <br> <br> 
                        <p><b><span style="font-size: 14px;">Authorized Signature</span></b></p>
                    </div>
                </div>
                <hr style="margin-top: -17px;">
                <div class="row" style="margin-bottom: -28px;">
                    <div class="col-lg-12 col-sm-12"style="text-align: center !important;margin-top: -16px;">
                        <h5 class="th">Thanks for doing service with us. !!!</h5>
                    </div>
                </div>
            </div>
        </div>
    </body>
    @endsection

<?php function displaywords($number){
      $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}

 ?>