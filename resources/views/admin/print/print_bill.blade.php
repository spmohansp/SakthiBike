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
                <div class="row">
                    <div class="col-lg-12 col-sm-12" style="text-align: right !important;">
                        <h3 align="right">SRI SAKTHI BIKE</h3>
                        <P>All Two Wheelers Servixe Cente</P>
                        <P style="margin-top: -15px;">Opp SPM Hospital, Rajiv Nagar, Alamarathu Compound,Tiruchengode</P>
                        <p style="margin-top: -15px;">Cell : 9003885959 ,E-mail:srisakthibike@gmail.com</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-sm-12" style="text-align: center !important;">
                        <h4 class="th"> Bill </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6" style="text-align: left !important;">
                        <h6>Bill To</h6>
                        <table class="table">
                            <tr>
                                <th colspan="2"> {{ $Bill->Client->name }}</th>
                            </tr>
                            <tr>
                                <td>Contact Number</td>
                                <th>: {{ $Bill->Client->phone_number }}</th>
                            </tr>
                            <tr>
                                <td>Bike Number</td>
                                <th>: {{ $Bill->Client->bike_no }}</th>
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
                                <th>: {{ date("m-d-Y", strtotime($Bill->date)) }}</th>
                            </tr>
                        </table>
                    </div>
                </div>
                <br>
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
                                <?php $key = 0; ?>
                                @foreach($Bill->BillProducts as $key=>$Product)
                                    <tr>
                                        <th>{{ ++$key }}</th>
                                        <th>{{ @$Product->Product->Product_Name }}</th>
                                        <th>{{ @$Product->quantity }}</th>
                                        <th align="right">{{ number_format(@$Product->Product->Selling_Price,2) }}</th>
                                        <th align="right">{{ number_format(@$Product->Total_Cost,2) }}</th>
                                    </tr>
                                @endforeach
                                @foreach($ExtraWorks as $key1=>$Extrawork)
                                    <?php $key2= $key1+$key ?> 
                                    <tr>
                                        <th>{{ ++$key2 }}</th>
                                        <th>{{ $Extrawork->BillExtraWork->name }}</th>
                                        <th></th>
                                        <th align="right"></th>
                                        <th align="right">{{ number_format($Extrawork->amount,2) }}</th>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th></th>
                                    <th>Total</th>
                                    <th>{{ @$Product->sum('quantity') }}</th>
                                    <th></th>
                                    <th align="right">{{ number_format($Bill->bill_amount,2) }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-7 col-sm-7" style="text-align: left !important;">
                        <h6>Invoice Amount In Words</h6>
                        <p>{{ displaywords($Bill->bill_amount) }}</p>
                        <br>
                        <h6>Payment Type</h6>
                        <p>Cash</p>
                        <br>
                        <h6>Terms and conditions:-</h6>
                        <p>Thanks for doing service with us.</p>
                    </div>
                    <div class="col-lg-5 col-sm-5"style="text-align: left !important;">
                       <h6>Amount</h6>
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
                <div class="row">
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
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-sm-12"style="text-align: center !important;">
                        <h5 class="th">Thanks for doing service with us. !!!</h5>
                    </div>
                </div>
            </div>
        </div>
    </body>
    @endsection

      <?php
    function displaywords($number){
    $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
    $digits = array('', '', 'hundred', 'thousand', 'ten thousand', 'lakh', 'ten lakh' ,'crore');

    $number = explode(".", $number);
    $result = array("","");
    $j =0;
    foreach($number as $val){
        // loop each part of number, right and left of dot
        for($i=0;$i<strlen($val);$i++){
            // look at each part of the number separately  [1] [5] [4] [2]  and  [5] [8]

            $numberpart = str_pad($val[$i], strlen($val)-$i, "0", STR_PAD_RIGHT); // make 1 => 1000, 5 => 500, 4 => 40 etc.
            if($numberpart <= 20){ // if it's below 20 the number should be one word
                $numberpart = 1*substr($val, $i,2); // use two digits as the word
                $i++; // increment i since we used two digits
                $result[$j] .= $words[$numberpart] ." ";
            }else{
                //echo $numberpart . "<br>\n"; //debug
                if($numberpart > 90){  // more than 90 and it needs a $digit.
                    $result[$j] .= $words[$val[$i]] . " " . $digits[strlen($numberpart)-1] . " ";
                }else if($numberpart != 0){ // don't print zero
                    $result[$j] .= $words[str_pad($val[$i], strlen($val)-$i, "0", STR_PAD_RIGHT)] ." ";
                }
            }
        }
        $j++;
    }
    if(trim($result[0]) != "") echo $result[0] . "Rupees ";
    if($result[1] != "") echo $result[1] . "Paise";
    echo " Only";
}

 ?>