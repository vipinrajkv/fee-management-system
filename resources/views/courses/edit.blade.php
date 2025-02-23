@extends('main_layout')
@section('content')
    <div class="col-md-8 content">
        <!-- <div class="panel panel-default"> -->

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading ">
                    Edit Course
                </div>
                <form id="updateStudent" method="POST" action="{{route('courses.update', $course->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="panel-body">
                        <div class="form-group col-md-10">
                            <label for="brand">Course Name:</label>
                            <input type="text" name="course_name"
                            value="{{ old('course_name', $course->course_name) }}"   
                             class="form-control" id="usr">
                            @error('course_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-10">
                            <label for="brand">Course Duration:</label>
                            <input type="number" name="duration"
                            value="{{ old('duration', $course->duration) }}"  min="1" max="24"
                             class="form-control" id="">
                            @error('duration')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-10">
                            <label for="brand">Fee Per Month:</label>
                            <input type="number" step="0.01" min="0" name="fee_per_month"
                            value="{{ old('fee_per_month', $course->fee_per_month) }}"  
                             class="form-control" id="">
                            @error('fee_per_month')
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
