<?php
namespace App\Services;
use App\Repositories\CourseRepository;
use App\Models\Course;
use DataTables;
use Illuminate\Http\JsonResponse;

class CourseService
{
    public function __construct(protected readonly CourseRepository $courseRepository) {
    }

    /**
     * Course create
     *
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        return $this->courseRepository->create($data);
    }

    /**
     * Course update
     *
     * @param array $data
     * @param Course $Course
     * @return void
     */
    public function update(array $data, Course $Course)
    {
        return $this->courseRepository->update($data, $Course);
    }

    /**
     * Course update
     *
     * @param array $data
     * @param Course $Course
     * @return void
     */
    public function delete(Course $Course)
    {
        return $this->courseRepository->delete($Course);
    }    
    
    /**
    * get Courses
    *
    * @param array $data
    * @return mixed
    */
    public function getCoursesWithStudents()
    {
        return $this->courseRepository->getCoursesWithStudents();
    }

    public function getStudentEnrollCourse(int $studentId)
    {
        return $this->courseRepository->getStudentEnrollCourse($studentId);
    }


}