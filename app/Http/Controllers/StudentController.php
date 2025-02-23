<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use App\Services\StudentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class StudentController extends Controller
{
    public function __construct(protected readonly StudentService $studentService)
    {
       
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = $this->studentService->getStudents();

        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request): RedirectResponse
    {
        $studentData = $request->validated();
        
        $this->studentService->create($studentData);

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function assignToCourse(): View
    {
        $students = $this->studentService->getStudents();
        $courses = $this->studentService->getAllCourses();

        return view('students.assign_to_course', compact('courses','students'));
    }

    public function addCourseToStudent(Request $request): RedirectResponse
    {
        $studentId = $request->student;
        $courseIds = $request->course;

        if (!empty($courseIds)) {
             $this->studentService->assignCourseToStudent($studentId, $courseIds);
        }
        else {
            return redirect()->back()->with('error', 'Please select Inputs.');
        }

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function studentCourseFeeList(Request $request): View
    {
        $studentCourseFees = $this->studentService->getStudentsCourseFeesList();
        // dd($studentCourseFees);
        return view('students.student_course_fee', compact('studentCourseFees'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
