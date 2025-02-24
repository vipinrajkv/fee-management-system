@extends('main_layout')
@section('content')
@if (session('success'))
<div class="alert alert-success">
	{{ session('success') }}
</div>
@elseif(session('error'))
<div class="alert alert-danger">
	{{ session('error') }}
</div>
@endif
<h2 class="text-center">Manage Payments</h2>
<div class="container-fluid">
    <div class="col-md-10 custyle">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="text-right" style="margin-top: 18px;">
        </div>
        <table class="table table-striped custab">
            <thead>
                <tr>
                    <th>Sl No</th>
                    <th>Student Name</th>
                    <th >Course Name</th>
                    <th>Payment Type</th>
                    <th>Total Course Fee</th>
                    <th>Duration</th>
                    <th>Fee Per Month</th>
                    <th>Amount Paid</th>
                </tr>
            </thead>
            @foreach ($paymentDetails as $payment)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$payment->student_name}}</td>
                    <td>{{$payment->course_name}}</td>
                    <td>{{$payment->payment_type}}</td>
                    <td>{{$payment->fee_per_month * $payment->duration}}</td>
                    <td>{{$payment->duration}}</td>
                    <td>{{$payment->amount_paid}}</td>
    
                    
                    <td class="text-center"><a class='btn btn-info btn-xs' href="" style="margin-top: 11px;">
                        <span class="glyphicon glyphicon-edit"></span> Edit</a></td>
                </tr>
                @endforeach
        </table>
    </div>
</div>
@stop
