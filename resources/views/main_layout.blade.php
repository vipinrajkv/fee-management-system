<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fee Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="{{ asset('css/custom_style.css') }}">
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet"
		id="bootstrap-css"> --}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- -->
    {{-- <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"
        type="text/javascript"></script>
    <script language="JavaScript"
        src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"
        type="text/javascript"></script>
    <link rel="stylesheet" type="text/css"
        href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css"> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"
        rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <link href=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css"
        rel="stylesheet">
</head>

<body>

    <!------ Include the above in your HEAD tag ---------->

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
                    MENU
                </button>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    Fee Management
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @guest
                        @if (Route::has('login'))
                            <li><a href="{{ route('login') }}" target="_blank">Login</a></li>
                        @endif
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" target="_blank">Register</a></li>
                        @endif
                    @else
                        <li class="dropdown ">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="divider"></li>
                                <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid main-container">
        <div class="col-md-2 sidebar">
            <div class="row">
                <div class="absolute-wrapper"> </div>
                <!-- Menu -->
                <div class="side-menu">
                    <nav class="navbar navbar-default" role="navigation">
                        <!-- Main Menu -->
                        <div class="side-menu-container">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#"><span class="glyphicon glyphicon-dashboard"></span>
                                        Dashboard</a></li>

                                <li class="panel panel-default" id="dropdown">
                                    <a data-toggle="collapse" href="#dropdown-lvl1">
                                        <span class="glyphicon glyphicon-user"></span> Students <span
                                            class="caret"></span>
                                    </a>
                                    <div id="dropdown-lvl1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul class="nav navbar-nav">
                                                <li><a href="{{ route('students.create') }}">Add Student</a></li>
                                                <li><a href="{{ route('students.index') }}">View Student</a></li>
                                                <li><a href="{{ route('student.assign.course') }}">Assign Courses To
                                                        Student</a></li>
                                                <li><a href="{{ route('student.courses.feeslist') }}">Students Courses
                                                        & Fees</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="panel panel-default" id="dropdown">
                                    <a data-toggle="collapse" href="#dropdown-lvl2">
                                        <span class="glyphicon glyphicon-user"></span>Courses<span
                                            class="caret"></span>
                                    </a>
                                    <div id="dropdown-lvl2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul class="nav navbar-nav">
                                                <li><a href="{{ route('courses.create') }}">Add Courses</a></li>
                                                <li><a href="{{ route('courses.index') }}">View Courses</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="panel panel-default" id="dropdown">
                                    <a data-toggle="collapse" href="#dropdown-lvl3">
                                        <span class="glyphicon glyphicon-user"></span>Payments / Fee <span
                                            class="caret"></span>
                                    </a>
                                    <div id="dropdown-lvl3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul class="nav navbar-nav">
                                                <li><a href="{{ route('add.payment') }}">Add Payment</a></li>
                                                <li><a href="{{ route('student.fee.payment') }}">View Payments</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav>

                </div>
            </div>
        </div>
        {{-- @endauth --}}

        @yield('content')

    </div>
    <footer class="pull-left footer footer_div">
        <p class="col-md-12  text-center">

            Copyright &COPY; {{ date('Y') }}
        </p>
    </footer>
    <script type="text/javascript">
        $(document).ready(function() {
            $("[data-toggle=tooltip]").tooltip();
        });
    </script>
    {{-- </div> --}}
    <script>
        $(document).ready(function() {
            $('#date').datepicker({
                dateFormat: 'dd-mm-yy',
            });
        });

        $(function() {
            $('.selectpicker').selectpicker();
        });

        $(document).ready(function() {
            $('#checkboxes').multiselect();
        });


        $(document).ready(function() {
            $('#select-student').on('change', function() {
                var studentId = $(this).val();
                var url = "{{ route('student.EnrollCourse', ':id') }}".replace(':id', studentId);
                if (studentId) {

                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(data) {
                            $('#courses').empty();
                            $.each(data, function(index, course) {
                                $('#courses').append('<option value="' + course
                                    .course_id + '">' + course.course_name +
                                    '</option>');
                            });

                            $('#courses').val(data[0].course_id).trigger('change');
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX error: ' + status + ' - ' + error);
                        }
                    });
                } else {
                    $('#courses').empty();
                    $('#courses').append('<option value="">Select Course</option>');
                }
            });


            $('#courses').on('change', function() {
                var selectedCourseId = $(this).val();

                $.ajax({
                    url: "{{ route('student.EnrollCourse', ':id') }}".replace(':id', $(
                        '#select-student').val()),
                    type: 'GET',
                    success: function(data) {
                        var selectedCourse = data.find(course => course.course_id ==
                            selectedCourseId);
                        if (selectedCourse) {
                            $('#courseFee').val(selectedCourse.fee_per_month);
                            $('#courseDuration').val(selectedCourse.duration);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error: ' + status + ' - ' + error);
                    }
                });
            });

        });

        $('.status-checkbox').change(function() {
            var studentId = $(this).data('studentid');
            var status = $(this).prop('checked') ? 1 : 0;
   
            $.ajax({
                url: '{{ route('student.updateStatus') }}',
                method: 'POST',
                data: {
                    student_id: studentId,
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        alert('Status updated successfully!');
                        location.reload();
                    }
                },
                error: function(xhr) {
                    alert('An error occurred');
                }
            });
        });

        $('.reject-btn').click(function(event) {
            event.preventDefault();
        var studentId = $(this).data('id');
        $.ajax({
            url: '{{ route('student.reject', '') }}/' + studentId,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    alert('Student rejected successfully!');
                    location.reload();
                }
            },
            error: function(xhr) {
                alert('An error occurred');
            }
        });
    });

    </script>

</html>
