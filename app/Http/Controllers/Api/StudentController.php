<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use App\Services\StudentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Classes\ApiResponseClass;
use App\Http\Resources\StudentResource;
use Illuminate\Http\JsonResponse;

final class StudentController extends Controller
{
    public function __construct(
        protected readonly StudentService $studentService,
        protected readonly ApiResponseClass $apiResponse,
        )
    {   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request): JsonResponse
    {
        $studentData = $request->validated();
        $student = $this->studentService->create($studentData);

        return $this->apiResponse->sendResponse(new StudentResource($student), 'Student created successfully.');
    }

}
