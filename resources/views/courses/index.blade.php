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
<h2 class="text-center">Manage Courses</h2>
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
                <tr>
                    <td>11</td>
                    <td>22</td>
                    <td >44</td>
                    <td>52</td>
                    <td>52</td>
                    <td class="text-center"><a class='btn btn-info btn-xs' href="{{route('courses.edit',5)}}" style="margin-top: 11px;">
                        <span class="glyphicon glyphicon-edit"></span> Edit</a></td>
                    <td class="text-center"> <a href="{{route('courses.destroy',5)}}"class="btn btn-danger btn-xs"  style="margin-top: 11px;">
                        <span class="glyphicon glyphicon-remove"></span>
                            Del</a></td>
                </tr>
        </table>
    </div>
</div>
@stop
