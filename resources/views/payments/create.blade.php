@extends('main_layout')
@section('content')
<div class="col-md-8 content">
    <!-- <div class="panel panel-default"> -->
    <div class="panel-heading">
    </div>
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                       Add Fee/Payment
                    </div>
                    <form method="POST" action="{{route('save.payment')}}" >
                        @csrf
                    <div class="panel-body">
                        <div class="form-group col-md-10">
                            <label for="brand">Student Name:</label>
                            <select class="form-control selectpicker" name="student" id="select-student" data-live-search="true">
                                @foreach ($students as $student)
                                <option value="{{$student->student_id}}" data-tokens="{{$student->student_name}}">{{$student->student_name}}</option>
                                @endforeach 
                            </select>
                            @error('student_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-10">
                            <label for="usr">Course:</label>
                            <div class="dropdown">
                                <select class="form-control category_list" id="courses" name="course">
                                </select>
                                @error('category')
                                 <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-10">
                            <label for="brand">Course Fee:</label>
                            <input type="number" readonly name="course_fee"
                             value =""  
                             class="form-control" id="courseFee">
                            @error('student_email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-10">
                            <label for="brand">Course Duration (Months):</label>
                            <input type="number" readonly id="courseDuration" name="course_duration"
                             value =""  
                             class="form-control">
                        </div>
                        <div class="form-group col-md-10">
                            <label for="brand">Payment Type:</label>
                            <select class="form-control selectpicker" name="payment_type" id="select-student" data-live-search="true">
                                <option value="emi" >Emi</option>
                                <option value="one_time" >One Time Payment</option>
                            </select>
                        </div>
                        <div class="form-group col-md-10 ">
                            <button class="btn btn-success" type="input"> Cancel</button>
                            <button class="btn btn-primary" type="submit"> Submit</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
</div>
<!-- </div> -->
@stop