<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Services\CourseService;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class CourseController extends Controller
{
    public function __construct(protected readonly CourseService $courseService)
    {
       
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('courses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $courseData = $request->validated();
        $this->courseService->create($courseData);

        return redirect()->route('courses.index')
            ->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $courseData = $request->validated();

        try {
            $this->courseService->update($courseData, $course);
            session()->flash('success', 'Course  updated successfully.');
       } catch (\Exception $e) {
            session()->flash('error', 'Course  update failed: ' . $e->getMessage());
       } 

       return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        try {
            $this->courseService->delete($course);
            session()->flash('success', 'Course deleted successfully.');
       } catch (\Exception $e) {
            session()->flash('error', 'Course deletion failed: ' . $e->getMessage());
       } 

       return redirect()->route('courses.index');
    }
}
