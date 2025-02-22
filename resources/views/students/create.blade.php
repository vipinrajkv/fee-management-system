@extends('main_layout')
@section('content')
<div class="col-md-8 content">
    <!-- <div class="panel panel-default"> -->
    <div class="panel-heading">
    </div>
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                       Create Student
                    </div>
                    <form method="POST" action="{{route('students.store')}}" >
                        @csrf
                    <div class="panel-body">
                        <div class="form-group col-md-10">
                            <label for="brand">Student Name:</label>
                            <input type="text" name="student_name"
                             value =""  
                             class="form-control" id="usr">
                            @error('student_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-10">
                            <label for="brand">Student Email:</label>
                            <input type="email" name="student_email"
                             value =""  
                             class="form-control" id="">
                            @error('student_email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-10">
                            <label for="brand">Student Phone:</label>
                            <input type="email" name="student_number"
                             value =""  
                             class="form-control" id="">
                            @error('student_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-10">
                            <label for="brand">Student Date of Birth:</label>
                            <input type="email" name="student_dob"
                             value =""  
                             class="form-control" id="">
                            @error('student_dob')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div><div class="form-group col-md-10">
                            <label for="brand">Student Address:</label>
                            <textarea  name="student_address"
                             value =""  
                             class="form-control" id=""> </textarea>
                            @error('student_address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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