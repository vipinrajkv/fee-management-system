<?php
namespace App\Services;
use App\Repositories\StudentRepository;
use App\Models\Student;
use App\Repositories\CourseRepository;
use Illuminate\Support\Facades\DB;

final class StudentService
{
    public function __construct(
        protected readonly StudentRepository $studentRepository,
        protected readonly CourseRepository $courseRepository
        )
    {}

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


   public function getAllCourses()
   {
       return $this->courseRepository->getCourses();
   }

   public function getStudents()
   {
       return $this->studentRepository->getStudents();
   }

   public function assignCourseToStudent(int $studentId, array $courseIds)
   {
       return $this->courseRepository->assignCourseToStudent($studentId, $courseIds);
   }

   public function getStudentsCourseFeesList()
   {
       return $this->courseRepository->getStudentsCourseFeesList();
   }

   public function getCourseEnrollStudent()
   {
       return $this->courseRepository->getCourseEnrollStudent();
   }

   public function storePayment($paymentDetails)
    {
    DB::beginTransaction();

    try {
        $paymentId = DB::table('payments')->insertGetId([
            'student_id' => $paymentDetails->student,
            'course_id' => $paymentDetails->course,
            'amount_paid' => $paymentDetails->course_fee,
            'payment_type' => $paymentDetails->payment_type,
            'date_of_payment' => now(),
        ]);

        DB::table('payment_details')->insert([
            'payment_id' => $paymentId,
            'amount_paid' => $paymentDetails->course_fee,
            'date_of_payment' => now(),
        ]);

        DB::commit();

        return redirect()->route('payments.index')
            ->with('success', 'Payment created successfully.');
    } catch (\Exception $e) {
        DB::rollBack();

        return redirect()->back()
        ->with('error', 'There was an error processing the payment.');
    } 
    }

    public function getStudentFeePayments()
    {
        return $this->courseRepository->getStudentFeePayments();
    }

    public function updateStatus($studentId, $status)
    {
        return $this->studentRepository->updateStatus($studentId, $status);
    }

    public function rejectStudent($studentId)
    {
        return $this->studentRepository->rejectStudent($studentId);
    }
}