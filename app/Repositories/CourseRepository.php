<?php

namespace App\Repositories;

use App\Models\Course;
use Illuminate\Support\Facades\DB;

final class CourseRepository
{

    public function __construct(protected readonly Course $course) {}

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

    public function getCourses()
    {
        return $this->course->all();
    }

    public function getCoursesWithStudents()
    {
        return $this->course
            ->leftJoin('student_courses', 'student_courses.course_id', '=', 'courses.id')
            ->select(
                'courses.id',
                'courses.course_name',
                'courses.duration',
                'courses.fee_per_month',
                DB::raw('COUNT(student_courses.course_id) as student_count')
            )
            ->groupBy('courses.id', 'courses.course_name', 'courses.duration', 'courses.fee_per_month')
            ->get();
    }

    public function assignCourseToStudent(int $studentId, array $courseIds)
    {
        foreach ($courseIds as $courseId) {
            DB::table('student_courses')->insert([
                'student_id' => $studentId,
                'course_id' => $courseId,
            ]);
        }
    }



    public function getStudentsCourseFeesList()
    {
        $results = DB::table('student_courses')
            ->join('students', 'student_courses.student_id', '=', 'students.id')
            ->join('courses', 'student_courses.course_id', '=', 'courses.id')
            ->select(
                'students.student_name',
                 'courses.course_name',
                'courses.fee_per_month',
                'courses.duration',
                DB::raw('GROUP_CONCAT(courses.course_name SEPARATOR ", ") as course_names'),
                DB::raw('GROUP_CONCAT(courses.fee_per_month SEPARATOR ", ") as fee_per_months'),
                DB::raw('GROUP_CONCAT(courses.duration SEPARATOR ", ") as durations')
            )
           ->groupBy('students.id', 'students.student_name', 'courses.course_name', 'courses.fee_per_month', 'courses.duration')->get();

        return $results;
    }

    public function getCourseEnrollStudent()
    {
        $results = DB::table('student_courses')
            ->join('students', 'student_courses.student_id', '=', 'students.id')
            ->select('students.id as student_id','students.student_name',)
            ->groupBy('students.id', 'students.student_name')
            ->get();

        return $results;
    }

    public function getStudentEnrollCourse(int $studentId)
    {
        $results = DB::table('student_courses')
            ->join('courses', 'student_courses.course_id', '=', 'courses.id')
            ->select('student_courses.course_id', 'courses.fee_per_month', 'courses.duration', 'courses.course_name')
            ->where('student_courses.student_id', $studentId)
            ->groupBy('student_courses.course_id', 'courses.fee_per_month', 'courses.duration', 'courses.course_name')
            ->get();

        return $results;
    }

    public function getStudentFeePayments()
    {
        $results = DB::table('payments')
            ->join('students', 'payments.student_id', '=', 'students.id')
            ->join('courses', 'payments.course_id', '=', 'courses.id')
            ->join('payment_details', 'payments.id', '=', 'payment_details.payment_id')
            ->select(
                'payments.id as payment_id',
                'students.student_name',
                'courses.course_name',
                'courses.fee_per_month',
                'courses.duration',
                'payment_details.amount_paid',
                'payments.payment_type',
                'payment_details.date_of_payment',
                'payment_details.date_of_payment as payment_created_at'
            )
            ->get();

        return $results;
    }
}
