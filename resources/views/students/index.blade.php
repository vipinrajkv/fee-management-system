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
                    {{-- <th class="text-right">Action</th> --}}
                </tr>
            </thead>
                <tr>
                    <td>11</td>
                    <td>22</td>
                    <td >44</td>
                    <td>12</td>
                    <td>142</td>
                    <td>52</td>
                    <td class="text-center">
                        <div class="checkbox checbox-switch switch-success">
                            <label>
                                <input type="checkbox" name="" checked="" />
                                <span></span>
                            </label>
                        </div>
                    </td>
                    <td class="text-center"><a class='btn btn-warning btn-xs' href="" style="margin-top: 11px;">
                        <span class="glyphicon glyphicon-edit"></span> Suspend</a></td>
                    <td class="text-center"><a class='btn btn-danger btn-xs' href="" style="margin-top: 11px;">
                        <span class="glyphicon glyphicon-remove"></span> Reject</a></td>
                    
                    <td class="text-center"><a class='btn btn-info btn-xs' href="" style="margin-top: 11px;">
                        <span class="glyphicon glyphicon-edit"></span> Edit</a></td>
                </tr>
        </table>
    </div>
</div>
@stop
