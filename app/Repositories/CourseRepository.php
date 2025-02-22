<?php

namespace App\Repositories;
use App\Models\Course;

final class CourseRepository 
{
    
    public function __construct(protected readonly Course $course) {
    }

    /**
     * Course create
     *
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        return $this->course->create($data);
    }

    /**
     *  Course update
     *
     * @param array $data
     * @param Course $course
     * @return void
     */
    public function update(array $data,  Course $course)
    {
        $course->update($data);
    }

    /**
     * Course delete
     *
     * @param Course $course
     * @return void
     */
    public function delete(Course $course)
    {
        $course->delete();
    }
} 