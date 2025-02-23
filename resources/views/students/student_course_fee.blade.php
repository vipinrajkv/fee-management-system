@extends('main_layout')
@section('content')

<h2 class="text-center">Students Courses and Fees</h2>
<div class="container-fluid">
    <div class="col-md-10 custyle">
        <div class="text-right" style="margin-top: 18px;">
        </div>
        <table class="table table-striped custab">
            <thead>
                <tr>
                    <th>Sl No</th>
                    <th>Student Name</th>
                    <th >Course Name</th>
                    <th>Fee Per Month</th>
                    <th>Duration</th>
                </tr>
            </thead>
            @foreach ($studentCourseFees as $studentCourseFee)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$studentCourseFee->student_name}}</td>
                    {{-- <td >{{$studentCourseFee->course_names}}</td> --}}
                    <td>{!! ucfirst(nl2br(e(str_replace(',', "\n", $studentCourseFee->course_names)))) !!}</td>
                    <td>{!! nl2br(e(str_replace(',', "\n", $studentCourseFee->fee_per_months))) !!}</td>
                    <td>{!! nl2br(e(str_replace(',', "\n", $studentCourseFee->durations))) !!}</td>
                </tr>            
            @endforeach
        </table>
    </div>
</div>
@stop
