@extends('main_layout')
@section('content')

<h2 class="text-center">Courses</h2>
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
                    <th>Course Name</th>
                    <th >Duration (Months)</th>
                    <th>Fee Per Month</th>
                    <th>Enrolled Students</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            @foreach ($courses as $course)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$course->course_name}}</td>
                    <td >{{$course->duration}}</td>
                    <td>{{$course->fee_per_month}}</td>
                    <td>{{$course->student_count}}</td>
                    <td class="text-center"><a class='btn btn-info btn-xs' href="{{route('courses.edit', $course->id)}}" style="margin-top: 11px;">
                        <span class="glyphicon glyphicon-edit"></span> Edit</a></td>
                    <td class="text-center"> <a href="{{route('courses.destroy', $course->id)}}"class="btn btn-danger btn-xs"  style="margin-top: 11px;">
                        <span class="glyphicon glyphicon-remove"></span>
                            Del</a></td>
                </tr>            
                @endforeach
        </table>
    </div>
</div>
@stop
