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
                    <form method="POST" action="{{route('students.store')}}" >
                        @csrf
                    <div class="panel-body">
                        <div class="form-group col-md-10">
                            <label for="brand">Student Name:</label>
                            <select class="form-control selectpicker" id="select-country" data-live-search="true">
                                <option data-tokens="china">China</option>
                                <option data-tokens="malayasia">Malayasia</option>
                                <option data-tokens="singapore">Singapore</option>
                                </select>
                            @error('student_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-10">
                            <label for="usr">Client:</label>
                            <div class="dropdown"style="width: 100%;">
                                <select class="form-control category_list"  id="checkboxes" multiple="multiple"> 
                                    <option value="Linked list">Linked list</option>        
                                    <option value="Array">Array</option>             
                                    <option value="Strings">Strings</option>    
                                    <option value="Stack">Stack</option>  
                                    <option value="Queue">Queue</option>
                                    <option value="Graph">Graph</option>  
                                    <option value="Tree">Tree</option>
                                    <option value="Maps">Maps</option>
                                </select>
                                @error('client_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
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