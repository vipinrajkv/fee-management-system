@extends('main_layout')
@section('content')

<h2 class="text-center">Manage Students</h2>
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
                    <th>Name</th>
                    <th >Email</th>
                    <th>Phone Number</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            @foreach ($students as $student)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$student->student_name}}</td>
                    <td >{{$student->student_email}}</td>
                    <td>{{$student->student_phone}}</td>
                    <td>{{$student->student_dob}}</td>
                    <td>{{$student->student_address}}</td>
                    <td class="text-center">
                        <div class="checkbox checbox-switch switch-success">
                            <label>
                                <input type="checkbox" class="status-checkbox" data-studentId="{{$student->id}}" name="activeStatus" {{ $student->is_active == 1 ? 'checked' : '' }} />
                                <span></span>
                            </label>
                        </div>
                    </td>
                    <td class="text-center"><a class='btn btn-warning btn-xs' href="" style="margin-top: 11px;">
                        <span class="glyphicon glyphicon-edit"></span> Suspend</a></td>
                    <td class="text-center"><a class='btn btn-danger btn-xs reject-btn' data-id="{{$student->id}}" href="" style="margin-top: 11px;">
                        <span class="glyphicon glyphicon-remove"></span> Reject</a></td>
                </tr>            
            @endforeach
        </table>
    </div>
</div>
@stop
