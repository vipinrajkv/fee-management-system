<?php
namespace App\Services;
use App\Repositories\StudentRepository;
use App\Models\Student;

class StudentService
{
    public function __construct(protected readonly StudentRepository $studentRepository)
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
        return $this->studentRepository->create($data);
    }

    /**
     * Student update
     *
     * @param array $data
     * @param Student $Student
     * @return void
     */
    public function update(array $data, Student $Student)
    {
        return $this->studentRepository->update($data, $Student);
    }

    /**
     * Student update
     *
     * @param array $data
     * @param Student $Student
     * @return void
     */
    public function delete(Student $Student)
    {
        return $this->studentRepository->delete($Student);
    }    
    
    /**
    * Student create
    *
    * @param array $data
    * @return void
    */
   public function getStudentDetails(array $data)
   {
       return $this->studentRepository->getStudentDetails($data);
   }
}