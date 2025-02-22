<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PaymentController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('courses', CourseController::class);
Route::resource('students', StudentController::class);
Route::resource('students', PaymentController::class);
Route::get('payments/addPayment', [PaymentController::class, 'addPayment'])->name('add.payment');
