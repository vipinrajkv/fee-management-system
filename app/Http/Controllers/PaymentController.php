<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use App\Services\StudentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class PaymentController extends Controller
{
    public function __construct(protected readonly StudentService $studentService)
    {}

    /**
     * Display the specified resource.
     */
    public function index(Student $student)
    {
        $paymentDetails = $this->studentService->getStudentFeePayments();

        return view('payments.index', compact('paymentDetails'));
    }

    public function addPayment()
    {
        $students = $this->studentService->getCourseEnrollStudent();

        return view('payments.create', compact('students'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function savePayment(Request $request): RedirectResponse
    {
        $this->studentService->storePayment($request);

        return redirect()->route('student.fee.payment')
            ->with('success', 'Payment added successfully.');
    }


}
