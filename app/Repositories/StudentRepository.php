<?php

namespace App\Repositories;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

final class StudentRepository
{

    public function __construct(protected readonly Student $student)
    {
        
    }

    /**
     * Student create
     *
     * @param array $data
     * @return void
     */
    public function getStudentDetails(array $data)
    {

    }

    /**
     * Student create
     *
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        dd($data);
        return $this->student->create($data);
    }

    /**
     *  Student update
     *
     * @param array $data
     * @param Student $Student
     * @return void
     */
    public function update(array $data,  Student $student)
    {
        $student->update($data);
    }

    /**
     * Student delete
     *
     * @param Student $Student
     * @return void
     */
    public function delete(Student $student)
    {
        $student->delete();
    }
}
