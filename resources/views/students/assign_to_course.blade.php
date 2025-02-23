@extends('main_layout')
@section('content')
<div class="col-md-8 content">
    <!-- <div class="panel panel-default"> -->
    <div class="panel-heading">
    </div>
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                       Assign Student To Course
                    </div>
                    <form method="POST" action="{{route('student.add-course')}}" >
                        @csrf
                    <div class="panel-body">
                        <div class="form-group col-md-10">
                            <label for="brand">Student Name:</label>
                            <select class="form-control selectpicker" name="student" id="select-country" data-live-search="true">
                                @foreach ($students as $student)
                                <option value="{{$student->id}}" data-tokens="{{$student->student_name}}">{{$student->student_name}}</option>
                                @endforeach 
                            </select>
                        </div>
                        <div class="form-group col-md-10">
                            <label for="usr">Course:</label>
                            <div class="dropdown"style="width: 100%;">
                                <select class="form-control category_list" name="course[]"  id="checkboxes" multiple="multiple"
                                style="width: 100%; max-width: 600px;"> 
                                @foreach ($courses as $course)
                                    <option value="{{$course->id}}">{{ucfirst($course->course_name)}}</option>
                                @endforeach                                  
                                </select>
                            </div>
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