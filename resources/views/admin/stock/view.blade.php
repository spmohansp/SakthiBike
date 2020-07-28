@extends('admin.layouts.master')

@section('Current-Page')
View Stock
@endsection

@section('Parent-Menu')
Stock
@endsection

@section('Menu')
View Stock
@endsection

@section('content')

<div class="tile">
    <div class="row ">
        <div class="col-lg-12">
            <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ url('admin/stock/add') }}'">Add Stock</button>
        </div>
    </div>
    <br>
    <div class="row ">
        <div class="col-lg-12">
            <div class="tile-body table-responsive">
                <table class="table table-bodered">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Date</th>
                            <th>Shop Name</th>
                            <th>Balance</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Stocks as$key => $Stock)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ date('d-m-Y', strtotime($Stock->date)) }}</td>
                                <td>{{ $Stock->Shop->name }}</td>
                                <td>{{ $Stock->balance }} </td>
                                <td>
                                    <a href="{{ route('admin.editStock',$Stock->id) }}"><button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true" style="color:#fff"></i></button></a>
                                    <a href="{{ route('admin.deleteStock',$Stock->id) }}"> <button class="btn btn-primary" onclick="return confirm('Are you sure?')"> <i class="fa fa-trash" aria-hidden="true" style="color:#fff" ></i></button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    {!! $Stocks->links() !!}
</div>

@endsection