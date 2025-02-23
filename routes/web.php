<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PaymentController;

// Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('courses', CourseController::class);
Route::resource('students', StudentController::class);
Route::get('student/assign-course', [StudentController::class, 'assignToCourse'])->name('student.assign.course');
Route::post('student/add-course', [StudentController::class, 'addCourseToStudent'])->name('student.add-course');
Route::get('student/courses-fees-list', [StudentController::class, 'studentCourseFeeList'])->name('student.courses.feeslist');
Route::get('payments/addPayment', [PaymentController::class, 'addPayment'])->name('add.payment');
Route::post('payments/save-payment', [PaymentController::class, 'savePayment'])->name('save.payment');
Route::get('payments/view-payment', [PaymentController::class, 'viewPaymenta'])->name('view.payment');
Route::get('payments/payment-list', [PaymentController::class, 'index'])->name('student.fee.payment');
Route::get('student-courses/{id}', [CourseController::class, 'getStudentEnrollCourse'])->name('student.EnrollCourse');
Route::resource('courses', CourseController::class);

