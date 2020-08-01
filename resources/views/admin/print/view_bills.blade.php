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
<div class="tile">
    <div class="pad">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body table-responsive">
                    <table class="table table-hover table-bordered DataTable">
                        <thead>
                            <tr>
                                <th class="csvth">S.no</th>
                                <th class="csvth">Date</th>
                                <th class="csvth">Bill No</th>
                                <th class="csvth">Customer Name</th>
                                <th class="csvth">Total Cost</th>
                                <th class="csvth">Balance</th>
                                <th class="hidden-print" >
                                    <center>Action</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody  id="tablebody">
                            @foreach($Bills as $key=>$Bill)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ date("d-m-Y", strtotime($Bill->date)) }}</td>
                                <td>{{ $Bill->bill_number }}</td>
                                <td>{{ @$Bill->Client->name }}</td>
                                <td>{{ @$Bill->bill_amount }}</td>
                                <td>{{ @$Bill->balance_amount }}</td>
                                <td>
                                    <a href="{{ route('admin.printBill',$Bill->id) }}"><button class="btn btn-primary  btn-sm"><i class="fa fa-print" aria-hidden="true" style="color:#fff"></i></button></a>
                                    <a href="{{ route('admin.editPrint',$Bill->id) }}"><button class="btn btn-primary  btn-sm"><i class="fa fa-pencil" aria-hidden="true" style="color:#fff"></i></button></a>
                                    <a href="{{ route('admin.deleteBill',$Bill->id) }}"><button class="btn btn-primary btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" aria-hidden="true" style="color:#fff"></i></button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
